<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HowItWorks;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use DataTables;
use Str; 

class HowItWorksController extends Controller
{
    public function index(Request $request){
        return view('admin.howitworks.index'); 
    }    

    public function getData(Request $request)
    {
        $data = howitworks::all(); 
        return DataTables::of($data)
            ->addColumn('action', function ($row) {
                return '
                    <button type="button" class="btn btn-outline-secondary edit_howitworks" data-id="' . $row->id . '"><i class="icofont-edit text-success"></i></button>
                    <button type="button" class="btn btn-outline-secondary delete_howitworks" data-id="' . $row->id . '"><i class="icofont-ui-delete text-danger"></i></button>
            
                ';  
            })
            ->rawColumns(['action']) // allow HTML rendering
            ->make(true);
    }
 
    public function StoreUpdate(Request $request)
    { 
        
        $imagePath = null; 
        $howitworks_id = $request->howitworks_id ?? null;
         if($howitworks_id){
            $data = howitworks::find($howitworks_id);
            if(!$data){
                return response()->json([
                    'result' => false,
                    'message' => "Data Not Found",
                ]);
            }
            $imagePath = $data->image; // Retain existing image if no new image is uploaded
        }else{
            $data = new howitworks();
        }

        if($request->hasFile('howitworks_image') && $request->file('howitworks_image')->isValid()) {
            $imagePath = storeImage($request->file('howitworks_image'), 'admin/howitworks');
            if (!$imagePath) {
                return redirect()->back()
                    ->with('error', 'Failed to upload image. Please try again.')
                    ->withInput();
            }
        } 
   
        $data->name = $request->name;
        $data->description = $request->description;
        $data->status = $request->howitworks_status;
        $data->image = $imagePath;
        $data->alt_tag = $request->alt_tag;
        $data->save();

        return response()->json([
            'result' => true,
            'message' => $howitworks_id ? 'How It Works Updated Successfully' : 'How It Works Save Successfully.',
        ]);
    }
 
    
    public function edit($id){
        $get_data = howitworks::find($id);
        if(empty($get_data)){
            return response()->json([
                'result' => false,
                'message' => "Data Not Found",
            ]);
        }

        return response()->json([
            'result' => true,
            "message" => "Data Found",
            "data" => $get_data,
        ]); 
    }

    public function destroy($id){
        $get_data = howitworks::find($id);
        if(empty($get_data)){
            return response()->json([
                'result' => false,
                'message' => "Data Not Found",
            ]);
        }
        $get_data->delete();
        return response()->json([
            'result' => true,
            "message" => "Data Deleted SuccessFulyy.",
        ]); 
    } 
}
