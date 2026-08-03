<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\FeatureProject;
use App\Models\Services;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Str;
use DataTables;
class FeatureProjectController extends Controller
{
    public function index(){
        return view('admin.featureproject.index'); 
    }

    public function create(){
        $data['services'] = Services::where('status','Active')->get();
        return view('admin.featureproject.create' , compact('data'));
    }
 
   public function Store(Request $request)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'featureproject_desc'    => 'nullable',
            'url'    => 'nullable', 
            'services' => 'required|array',
            'featureproject_title'   => 'nullable',
            'featureproject_status'  => 'nullable|in:Active,In-Active',
            'featureproject_alt'     => 'required|string|max:255',
            'featureproject_image'   => 'required|file|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
 
        if ($validator->fails()) { 
            
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please fix the validation errors.');
        }
        try {
            $imagePath = null;


            if ($request->hasFile('featureproject_image') && $request->file('featureproject_image')->isValid()) {
                // Try with compression first
                $imagePath = storeImage($request->file('featureproject_image'), 'admin/featureproject_image');
                
                if (!$imagePath) {
                    return redirect()->back()
                        ->with('error', 'Failed to upload image. Please try again.')
                        ->withInput();
                }
            } 

            
            // Create featureproject record (Correct field names)
            FeatureProject::create([
                'title'       => $request->featureproject_title,
                'description' => $request->featureproject_desc,
                'status'      => $request->featureproject_status ?? 'Active',
                'alt_tag'     => $request->featureproject_alt,
                'url'           => $request->url, 
                'home_status'  => $request->home_status ?? 'No',
                'image'       => $imagePath,
                'services'       => json_encode($request->services, true),
            ]);

            return redirect()->route('featureproject')->with('success', 'Record added successfully!');
        } catch (\Exception $e) {
            \Log::error('featureproject Store Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to save: ' . $e->getMessage());
        }
    }   

    public function getData() 
    {
        $featureproject = FeatureProject::whereNull('deleted_at')->get();
        return DataTables::of($featureproject)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                
                $editUrl = route('featureproject.edit', $row->id);
                return '
                    <a href="' . $editUrl . '" class="btn btn-outline-primary btn-sm">
                        <i class="icofont-edit"></i>
                    </a>
                    <button type="button" class="btn btn-outline-danger btn-sm delete_featureproject" data-id="' . $row->id . '">
                        <i class="icofont-ui-delete"></i>
                    </button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function Edit($id){
        $featureproject = Featureproject::find($id);
        $data['services'] = Services::where('status','Active')->get();
        return view('admin.featureproject.edit' , compact('featureproject' , 'data'));
    }

    public function Destory($id){
        $featureproject = FeatureProject::find($id);
        if(empty($featureproject)){
            return response()->json([
                'result' => false, 
                "message" => "Data Not Found."
            ]);
        }
        $featureproject->delete();
        return response()->json([
            'result' => true,
            'message' => "Data Deleted."
        ]);
    }


    public function Update(Request $request, $id)
    { 
        // 1. Validate the request
        $validator = Validator::make($request->all(), [
            'featureproject_desc'    => 'nullable',
            'url'    => 'nullable',
            'featureproject_title'   => 'nullable',
            'featureproject_status'  => 'required|in:Active,In-Active',
            'featureproject_alt'     => 'required|string|max:255',
            'featureproject_image'   => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
            'services' => 'required|array',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please correct the highlighted errors.');
        }

        try {
            // 2. Find the featureproject
            $featureproject = FeatureProject::findOrFail($id);

            $imagePath = $featureproject->image;

            if ($request->hasFile('featureproject_image') && $request->file('featureproject_image')->isValid()) {
                // Try with compression first
                $imagePath = storeImage($request->file('featureproject_image'), 'admin/featureproject_image');
                
                if (!$imagePath) {
                    return redirect()->back()
                        ->with('error', 'Failed to upload image. Please try again.')
                        ->withInput();
                }
            } 
 
            // 4. Update featureproject data
            $featureproject->update([
                'title'       => $request->featureproject_title,
                'description' => $request->featureproject_desc,
                'status'      => $request->featureproject_status,
                'alt_tag'     => $request->featureproject_alt,
                'url'     => $request->url,
                'image'       => $imagePath,
                'services'       => json_encode($request->services, true),
                'home_status'  => $request->home_status ?? 'No',
            ]);

            return redirect()->route('featureproject')->with('success', 'featureproject updated successfully!');
        } catch (\Exception $e) {
            \Log::error('featureproject update failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update featureproject: ' . $e->getMessage());
        }
    }

}
