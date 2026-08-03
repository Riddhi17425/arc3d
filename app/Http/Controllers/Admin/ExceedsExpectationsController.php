<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExceedsExpectations;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use DataTables;
use Str; 

class ExceedsExpectationsController extends Controller
{
    public function index(Request $request){
        return view('admin.exceeds_expectations.index'); 
    }    

    public function getData(Request $request)
    { 
        $data = ExceedsExpectations::all(); 
        return DataTables::of($data)
            ->addColumn('action', function ($row) {
                return '
                    <button type="button" class="btn btn-outline-secondary edit_exceeds_expectations" data-id="' . $row->id . '"><i class="icofont-edit text-success"></i></button>
                    <button type="button" class="btn btn-outline-secondary delete_exceeds_expectations" data-id="' . $row->id . '"><i class="icofont-ui-delete text-danger"></i></button>
            
                ';  
            })
            ->rawColumns(['action']) // allow HTML rendering
            ->make(true);
    }
 
    public function StoreUpdate(Request $request)
    { 
        
        $imagePath = null; 
        $exceeds_expectations_id = $request->exceeds_expectations_id ?? null;
         if($exceeds_expectations_id){
            $data = ExceedsExpectations::find($exceeds_expectations_id);
            if(!$data){
                return response()->json([
                    'result' => false,
                    'message' => "Data Not Found",
                ]);
            }
            $imagePath = $data->image; // Retain existing image if no new image is uploaded
        }else{
            $data = new ExceedsExpectations();
        }
   
        $data->name = $request->name;
        $data->description = $request->description;
        $data->status = $request->exceeds_expectations_status;
        $data->save();

        return response()->json([
            'result' => true,
            'message' => $exceeds_expectations_id ? 'Exceeds Expectations Updated Successfully' : 'Exceeds Expectations Save Successfully.',
        ]);
    }
 
    
    public function edit($id){
        $get_data = ExceedsExpectations::find($id);
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
        $get_data = ExceedsExpectations::find($id);
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
