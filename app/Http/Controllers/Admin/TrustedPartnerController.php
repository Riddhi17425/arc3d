<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrustedPartner;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use DataTables;
use Str;

class TrustedPartnerController extends Controller
{
    public function index(Request $request){
        return view('admin.trusted_partner.index'); 
    }   

    public function getData(Request $request)
    {
        $data = TrustedPartner::select(['id', 'name','image', 'status', 'created_at']);
        return DataTables::of($data)
            ->addColumn('action', function ($row) {
                return '
                    <button type="button" class="btn btn-outline-secondary edit_trusted_partner" data-id="' . $row->id . '"><i class="icofont-edit text-success"></i></button>
                    <button type="button" class="btn btn-outline-secondary delete_trusted_partner" data-id="' . $row->id . '"><i class="icofont-ui-delete text-danger"></i></button>
            
                '; 
            })
            ->rawColumns(['action']) // allow HTML rendering
            ->make(true);
    }
 
    public function store(Request $request)
    { 
        $exists = TrustedPartner::where('id', $request->trusted_partner_id)->exists();
        if ($exists) {
            return response()->json(['result' => false, 'message' => 'Image already exists.']);
        }
        $imagePath = null;
        if($request->hasFile('trusted_partner_image') && $request->file('trusted_partner_image')->isValid()) {
            // Try with compression first
            $imagePath = storeImage($request->file('trusted_partner_image'), 'admin/trusted_partner');
            
            if (!$imagePath) {
                return redirect()->back()
                    ->with('error', 'Failed to upload image. Please try again.')
                    ->withInput();
            }
        } 

        $data = new TrustedPartner();
        $data->status = $request->trusted_partner_status;
        $data->alt_tag = $request->alt_tag;
        $data->image = $imagePath;


        $data->save();

        return response()->json([
            'result' => true,
            'message' => 'Data Save Successfully.',
            'image' => $data->image
        ]);
    }
 
    public function update(Request $request, $id)
    {
        $data = TrustedPartner::find($id);
        if (!$data) {
            return response()->json(['result' => false, 'message' => 'Image not found.']);
        }

        // Optional: prevent name duplication
        $exists = TrustedPartner::where('id', $request->trusted_partner_id)->where('id', '!=', $id)->exists();
        if ($exists) {
            return response()->json(['result' => false, 'message' => 'Image already exists.']);
        } 

        $imagePath = $data->image; 
        if($request->hasFile('trusted_partner_image') && $request->file('trusted_partner_image')->isValid()) {
            // Try with compression first
            $imagePath = storeImage($request->file('trusted_partner_image'), 'admin/trusted_partner');
            
            if (!$imagePath) {
                return redirect()->back()
                    ->with('error', 'Failed to upload image. Please try again.')
                    ->withInput();
                }
        }  
        $data->status = $request->trusted_partner_status;
        $data->alt_tag = $request->alt_tag;
        $data->image = $imagePath ; 
        $data->save();

        return response()->json([
            'result' => true,
            'message' => 'Image Updated Successfully.',
        ]);
    }
    public function edit($id){
        $get_data = TrustedPartner::find($id);
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
        $get_data = TrustedPartner::find($id);
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
