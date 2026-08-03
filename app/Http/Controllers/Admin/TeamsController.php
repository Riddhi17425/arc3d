<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teams;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use DataTables;
use Str; 

class TeamsController extends Controller
{
    public function index(Request $request){
        return view('admin.teams.index'); 
    }   

    public function getData(Request $request)
    {
        $data = Teams::all();
        return DataTables::of($data)
            ->addColumn('action', function ($row) {
                return '
                    <button type="button" class="btn btn-outline-secondary edit_teams" data-id="' . $row->id . '"><i class="icofont-edit text-success"></i></button>
                    <button type="button" class="btn btn-outline-secondary delete_teams" data-id="' . $row->id . '"><i class="icofont-ui-delete text-danger"></i></button>
            
                '; 
            })
            ->rawColumns(['action']) // allow HTML rendering
            ->make(true);
    }
 
    public function StoreUpdate(Request $request)
    { 
        $exists = Teams::where('id', $request->teamsStore)->exists();
        if ($exists) {
            return response()->json(['result' => false, 'message' => 'This Team Member is Alredy Exits.']);
        }

        $imagePath = null; 
        $teams_id = $request->teams_id ?? null;
         if($teams_id){
            $data = Teams::find($teams_id);
            if(!$data){
                return response()->json([
                    'result' => false,
                    'message' => "Data Not Found",
                ]);
            }
            $imagePath = $data->image; // Retain existing image if no new image is uploaded
        }else{
            $data = new Teams();
        }

        if($request->hasFile('teams_image') && $request->file('teams_image')->isValid()) {
            $imagePath = storeImage($request->file('teams_image'), 'admin/teams');
            if (!$imagePath) {
                return redirect()->back()
                    ->with('error', 'Failed to upload image. Please try again.')
                    ->withInput();
            }
        } 
   
        $data->name = $request->name;
        $data->designation = $request->designation;
        $data->description = $request->description;
        $data->status = $request->teams_status;
        $data->image = $imagePath;
        $data->alt_tag = $request->alt_tag;
        $data->save();

        return response()->json([
            'result' => true,
            'message' => $teams_id ? 'Teams Updated Successfully' : 'Teams Save Successfully.',
        ]);
    }
 
    
    public function edit($id){
        $get_data = Teams::find($id);
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
        $get_data = Teams::find($id);
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
