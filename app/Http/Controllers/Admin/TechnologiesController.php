<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Technologies;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Str;
use DataTables;
class TechnologiesController extends Controller
{
    public function index(){
        return view('admin.technologies.index');
    }  

    public function create(){
        return view('admin.technologies.create');
    } 

   public function Store(Request $request)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'technologies_desc'    => 'required|string',
            'url'    => 'required|string',
            'technologies_shortname'   => 'required|string|max:255',
            'technologies_fullname'   => 'required|string|max:255',
            'technologies_status'  => 'nullable|in:Active,In-Active',
            'technologies_alt'     => 'required|string|max:255',
            'technologies_image'   => 'required|file|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please fix the validation errors.');
        }
        try {
            $imagePath = null;

            if ($request->hasFile('technologies_image') && $request->file('technologies_image')->isValid()) {
                // Try with compression first
                $imagePath = storeImage($request->file('technologies_image'), 'admin/technologies_image');
                
                if (!$imagePath) {
                    return redirect()->back()
                        ->with('error', 'Failed to upload image. Please try again.')
                        ->withInput();
                }
            } 

            
            // Create technologies record (Correct field names)
            Technologies::create([
                'shortname'     => $request->technologies_shortname,
                'fullname'      => $request->technologies_fullname,
                'description' => $request->technologies_desc,
                'status'      => $request->technologies_status ?? 'Active',
                'alt_tag'     => $request->technologies_alt,
                'url'     => $request->url,
                'image'       => $imagePath,
            ]);

            return redirect()->route('technologies')->with('success', 'Record added successfully!');
        } catch (\Exception $e) {
            \Log::error('technologies Store Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to save: ' . $e->getMessage());
        }
    }   

    public function getData()
    {
        $technologies = Technologies::whereNull('deleted_at')->get();
        return DataTables::of($technologies)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                
                $editUrl = route('technologies.edit', $row->id);
                return '
                    <a href="' . $editUrl . '" class="btn btn-outline-primary btn-sm">
                        <i class="icofont-edit"></i>
                    </a>
                    <button type="button" class="btn btn-outline-danger btn-sm delete_technologies" data-id="' . $row->id . '">
                        <i class="icofont-ui-delete"></i>
                    </button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function Edit($id){
        $technologies = Technologies::find($id);
        return view('admin.technologies.edit' , compact('technologies'));
    }

    public function Destory($id){
        $technologies = Technologies::find($id);
        if(empty($technologies)){
            return response()->json([
                'result' => false,
                "message" => "Data Not Found."
            ]);
        }
        $technologies->delete();
        return response()->json([
            'result' => true,
            'message' => "Data Deleted."
        ]);
    }


    public function Update(Request $request, $id)
    {
        // 1. Validate the request
        $validator = Validator::make($request->all(), [
            'technologies_desc'    => 'required|string',
            'url'    => 'required|string',
            'technologies_shortname'   => 'required|string|max:255',
            'technologies_fullname'   => 'required|string|max:255',
            'technologies_status'  => 'required|in:Active,In-Active',
            'technologies_alt'     => 'required|string|max:255',
            'technologies_image'   => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please correct the highlighted errors.');
        }

        try {
            // 2. Find the Technologies
            $technologies = Technologies::findOrFail($id);

            $imagePath = $technologies->image;

            if ($request->hasFile('technologies_image') && $request->file('technologies_image')->isValid()) {
                // Try with compression first
                $imagePath = storeImage($request->file('technologies_image'), 'admin/technologies_image');
                
                if (!$imagePath) {
                    return redirect()->back()
                        ->with('error', 'Failed to upload image. Please try again.')
                        ->withInput();
                }
            } 

            // 4. Update Technologies data
            $technologies->update([
                'shortname'       => $request->technologies_shortname,
                'fullname'       => $request->technologies_fullname,
                'description' => $request->technologies_desc,
                'status'      => $request->technologies_status,
                'alt_tag'     => $request->technologies_alt,
                'url'     => $request->url,
                'image'       => $imagePath,
            ]);

            return redirect()->route('technologies')->with('success', 'technologies updated successfully!');
        } catch (\Exception $e) {
            \Log::error('technologies update failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update technologies: ' . $e->getMessage());
        }
    }

}
