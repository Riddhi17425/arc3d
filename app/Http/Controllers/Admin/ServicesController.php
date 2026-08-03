<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Services;
use App\Models\HowItWorks;
use App\Models\ExceedsExpectations;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Str;
use DataTables;
class ServicesController extends Controller
{ 
    public function index(){ 
        return view('admin.service.index');
    } 

    public function create(){
        $data['howitworks'] = HowItWorks::where('status', 'Active')->get();
        $data['exceeds_expectations'] = ExceedsExpectations::where('status', 'Active')->get();
        return view('admin.service.create' , compact('data'));
    }
 
    public function Store(Request $request)
    {
        // Validate input
        $validator = Validator::make($request->all(), [ 
            'service_desc'    => 'nullable',
            'service_url'       => 'required|string|unique:services,url',
 
            'service_title'   => 'required|string|max:255',
            'service_status'  => 'nullable|in:Active,In-Active',
            'service_alt'     => 'nullable|string|max:255',
            'service_image'   => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
            'back_service_alt'     => 'nullable|string|max:255',
            'back_service_image'   => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
             
            'service_short_desc'   => 'nullable',
            'howitworks'          => 'nullable|array|min:3|max:5',
            'exceeds_expectations'          => 'nullable|array', 

            'its_worth_description'   => 'nullable|string',
            'its_worth_image'   => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
            'its_worth_image_alt'     => 'nullable|string|max:255',
            'howitworks_short_desc'   => 'nullable|string', 
            'howitworks_desc'   => 'nullable|string', 

            'meta_title'   => 'nullable|string|max:255',
            'meta_description'   => 'nullable|string|max:255',

        
        ]);
 
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please fix the validation errors.');
        }
        try {
            
            $imagePath = '';  
            if ($request->hasFile('service_image') && $request->file('service_image')->isValid()) {
                $imagePath = storeImage($request->file('service_image'), 'admin/service_image');
                if (!$imagePath) { 
                    return redirect()->back()
                        ->with('error', 'Failed to upload image. Please try again.')
                        ->withInput();
                }
            }  
            $backimagePath = '';  
            
            if ($request->hasFile('back_service_image') && $request->file('back_service_image')->isValid()) {
                $backimagePath = storeImage($request->file('back_service_image'), 'admin/back_service_image');
                if (!$backimagePath) { 
                    return redirect()->back()
                        ->with('error', 'Failed to upload image. Please try again.')
                        ->withInput();
                }
            } 
            
            $worthimagePath = '';
            if ($request->hasFile('its_worth_image') && $request->file('its_worth_image')->isValid()) {
                $worthimagePath = storeImage($request->file('its_worth_image'), 'admin/its_worth_image');
                if (!$worthimagePath) { 
                    return redirect()->back()
                        ->with('error', 'Failed to upload image. Please try again.')
                        ->withInput();
                }
            } 

            // Create service record (Correct field names) 
            Services::create([
                'title'       => $request->service_title, 
                'url'       => $request->service_url, 
                'description' => $request->service_desc,
                'status'      => $request->service_status ?? 'Active',
                'alt_tag'     => $request->service_alt,
                'image'       => $imagePath,
                'back_alt_tag'     => $request->back_service_alt,
                'back_image'       => $backimagePath,

                'service_short_desc'       => $request->service_short_desc,
                'howitworks'       => json_encode($request->howitworks),
                'exceeds_expectations'       => json_encode($request->exceeds_expectations),
                'its_worth_description'       => $request->its_worth_description,
                'its_worth_image'       => $worthimagePath,
                'its_worth_image_alt'       => $request->its_worth_image_alt,
                'howitworks_short_desc'       => $request->howitworks_short_desc,
                'howitworks_desc'       => $request->howitworks_desc,
                'meta_title'       => $request->meta_title,
                'meta_description'       => $request->meta_description,
            ]);

            return redirect()->route('services')->with('success', 'Record added successfully!');
        } catch (\Exception $e) {
            \Log::error('service Store Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to save: ' . $e->getMessage());
        }
    }   

    public function getData()
    {
        $service = Services::whereNull('deleted_at')->get();
        return DataTables::of($service)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                
                $editUrl = route('services.edit', $row->id);
                return '
                    <a href="' . $editUrl . '" class="btn btn-outline-primary btn-sm">
                        <i class="icofont-edit"></i>
                    </a>
                    <button type="button" class="btn btn-outline-danger btn-sm delete_service" data-id="' . $row->id . '">
                        <i class="icofont-ui-delete"></i>
                    </button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function Edit($id){
        $service = Services::find($id);
        $data['howitworks'] = HowItWorks::where('status', 'Active')->get();
        $data['exceeds_expectations'] = ExceedsExpectations::where('status', 'Active')->get();
        return view('admin.service.edit' , compact('service' , 'data'));
    }

    public function Destory($id){
        $service = Services::find($id);
        if(empty($service)){
            return response()->json([
                'result' => false,
                "message" => "Data Not Found." 
            ]);
        } 
        $service->delete();
        return response()->json([
            'result' => true,
            'message' => "Data Deleted."
        ]);
    }


    public function Update(Request $request, $id)
    {
        // 1. Validate the request
        $validator = Validator::make($request->all(), [
            'service_desc'    => 'nullable',
            'service_url' => 'required|string|unique:services,url,' . $id,
            'service_title'   => 'required|string|max:255',
            'service_status'  => 'required|in:Active,In-Active',
            'service_alt'     => 'nullable|string|max:255',
            'service_image'   => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
            'back_service_alt'     => 'nullable|string|max:255',
            'back_service_image'   => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
 
            'service_short_desc'   => 'nullable',
            'howitworks'          => 'nullable|array|min:3|max:5',
            'exceeds_expectations'          => 'nullable|array', 

            'its_worth_description'   => 'nullable|string',
            'its_worth_image'   => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
            'its_worth_image_alt'     => 'nullable|string|max:255',
            'howitworks_short_desc'   => 'nullable|string', 
            'howitworks_desc'   => 'nullable|string', 
            'meta_title'   => 'nullable|string|max:255',
            'meta_description'   => 'nullable|string|max:255',
        ]);
 
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please correct the highlighted errors.');
        }

        try {
            // 2. Find the service
            $service = Services::findOrFail($id);
 
            $imagePath = $service->image;
            if ($request->hasFile('service_image') && $request->file('service_image')->isValid()) {
                
                $imagePath = storeImage($request->file('service_image'), 'admin/service_image');
                
                if (!$imagePath) { 
                    return redirect()->back()
                        ->with('error', 'Failed to upload image. Please try again.')
                        ->withInput();
                }
            }  

            $backimagePath = $service->back_image;  
            if ($request->hasFile('back_service_image') && $request->file('back_service_image')->isValid()) {
                $backimagePath = storeImage($request->file('back_service_image'), 'admin/back_service_image');
                if (!$backimagePath) { 
                    return redirect()->back()
                        ->with('error', 'Failed to upload image. Please try again.')
                        ->withInput();
                }
            }  

            $worthimagePath = $service->its_worth_image;
            if ($request->hasFile('its_worth_image') && $request->file('its_worth_image')->isValid()) {
                $worthimagePath = storeImage($request->file('its_worth_image'), 'admin/its_worth_image');
                if (!$worthimagePath) { 
                    return redirect()->back()
                        ->with('error', 'Failed to upload image. Please try again.')
                        ->withInput();
                }
            } 

            // 4. Update service data
            $service->update([
                'title'       => $request->service_title,
                'description' => $request->service_desc,
                'status'      => $request->service_status,
                'alt_tag'     => $request->service_alt,
                'image'       => $imagePath,
                'back_alt_tag'     => $request->back_service_alt,
                'back_image'       => $backimagePath,
                'url'       => $request->service_url, 

                'service_short_desc'       => $request->service_short_desc,
                'howitworks'       => json_encode($request->howitworks),
                'exceeds_expectations'       => json_encode($request->exceeds_expectations),
                'its_worth_description'       => $request->its_worth_description,
                'its_worth_image'       => $worthimagePath,
                'its_worth_image_alt'       => $request->its_worth_image_alt,
                'howitworks_short_desc'       => $request->howitworks_short_desc,
                'howitworks_desc'       => $request->howitworks_desc,
                'meta_title'       => $request->meta_title,
                'meta_description'       => $request->meta_description,
            ]);

            return redirect()->route('services')->with('success', 'service updated successfully!');
        } catch (\Exception $e) {
            \Log::error('service update failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update service: ' . $e->getMessage());
        }
    }

}
