<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Industries;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Str;
use DataTables;
class IndustriesController extends Controller
{ 
    public function index(){
        return view('admin.industries.index');
    }

    public function create(){
        return view('admin.industries.create');
    }
 
   public function Store(Request $request)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'industries_desc'    => 'required|string',
            'industries_title'   => 'required|string|max:255',
            'industries_status'  => 'nullable|in:Active,In-Active',
            'industries_alt'     => 'required|string|max:255',
            'industries_image'   => 'required|file|mimes:jpg,jpeg,png,svg,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please fix the validation errors.');
        }
        try {
            $imagePath = null;
            if ($request->hasFile('industries_image') && $request->file('industries_image')->isValid()) {
                // Try with compression first
                $imagePath = storeImage($request->file('industries_image'), 'admin/industries_image');
                 
                if (!$imagePath) {
                    return redirect()->back()
                        ->with('error', 'Failed to upload image. Please try again.')
                        ->withInput();
                }
            } 
            
            // Create industries record (Correct field names)
            Industries::create([
                'title'       => $request->industries_title,
                'description' => $request->industries_desc,
                'status'      => $request->industries_status ?? 'Active',
                'alt_tag'     => $request->industries_alt,
                'image'       => $imagePath,
            ]);

            return redirect()->route('industries')->with('success', 'Record added successfully!');
        } catch (\Exception $e) {
            \Log::error('industries Store Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to save: ' . $e->getMessage());
        }
    }   

    public function getData()
    {
        $industries = Industries::whereNull('deleted_at')->get();
        return DataTables::of($industries)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                
                $editUrl = route('industries.edit', $row->id);
                return '
                    <a href="' . $editUrl . '" class="btn btn-outline-primary btn-sm">
                        <i class="icofont-edit"></i>
                    </a>
                    <button type="button" class="btn btn-outline-danger btn-sm delete_industries" data-id="' . $row->id . '">
                        <i class="icofont-ui-delete"></i>
                    </button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function Edit($id){
        $industries = Industries::find($id);
        return view('admin.industries.edit' , compact('industries'));
    }

    public function Destory($id){
        $industries = Industries::find($id);
        if(empty($industries)){
            return response()->json([
                'result' => false,
                "message" => "Data Not Found."
            ]);
        }
        $industries->delete();
        return response()->json([
            'result' => true,
            'message' => "Data Deleted."
        ]);
    }


    public function Update(Request $request, $id)
    {
        // 1. Validate the request
        $validator = Validator::make($request->all(), [
            'industries_desc'    => 'required|string',
            'industries_title'   => 'required|string|max:255',
            'industries_status'  => 'required|in:Active,In-Active',
            'industries_alt'     => 'required|string|max:255',
            'industries_image'   => 'nullable|file|mimes:jpg,jpeg,png,svg,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please correct the highlighted errors.');
        }

        try {
            // 2. Find the industries
            $industries = Industries::findOrFail($id);

            $imagePath = $industries->image;

            if ($request->hasFile('industries_image') && $request->file('industries_image')->isValid()) {
                // Try with compression first
                $imagePath = storeImage($request->file('industries_image'), 'admin/industries_image');
                
                if (!$imagePath) { 
                    return redirect()->back()
                        ->with('error', 'Failed to upload image. Please try again.')
                        ->withInput();
                }
            }  

            // 4. Update industries data
            $industries->update([
                'title'       => $request->industries_title,
                'description' => $request->industries_desc,
                'status'      => $request->industries_status,
                'alt_tag'     => $request->industries_alt,
                'image'       => $imagePath,
            ]);

            return redirect()->route('industries')->with('success', 'industries updated successfully!');
        } catch (\Exception $e) {
            \Log::error('industries update failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update industries: ' . $e->getMessage());
        }
    }

}
