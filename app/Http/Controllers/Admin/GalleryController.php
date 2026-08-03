<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use DataTables;
use Str;

class GalleryController extends Controller 
{
    public function index(Request $request){
        return view('admin.gallery.index');  
    }   

    public function getData(Request $request)
    {
        $data = Gallery::all();
        return DataTables::of($data)
            ->addColumn('action', function ($row) {
                return '
                    <button type="button" class="btn btn-outline-secondary edit_gallery" data-id="' . $row->id . '"><i class="icofont-edit text-success"></i></button>
                    <button type="button" class="btn btn-outline-secondary delete_gallery" data-id="' . $row->id . '"><i class="icofont-ui-delete text-danger"></i></button>
                
                '; 
            })
            ->rawColumns(['action']) // allow HTML rendering
            ->make(true);
    }
 
    public function StoreUpdate(Request $request)
    {   
        $imagePath = null;
        $gallery_id = $request->gallery_id;
        if ($gallery_id) {
            $data = Gallery::find($gallery_id); 
            $imagePath = $data->image; 
        }else{ 
            $data = new Gallery();
        }

        
        if($request->hasFile('gallery_image') && $request->file('gallery_image')->isValid()) {
            // Try with compression first
            $imagePath = storeImage($request->file('gallery_image'), 'admin/gallery');
            if (!$imagePath) {
                return redirect()->back()
                    ->with('error', 'Failed to upload image. Please try again.')
                    ->withInput();
            }
        } 
 
        $data->gallery_type = $request->gallery_type;
        $data->status = $request->gallery_status;
        $data->image = $imagePath;
        $data->alt_tag = $request->alt_tag;

        $data->save();

        return response()->json([
            'result' => true,
            'message' => $gallery_id ? 'Data Updated Successfully.' : 'Data Save Successfully.',
        ]);
    }
 
    public function edit($id){
        $get_data = Gallery::find($id);
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
        $get_data = Gallery::find($id);
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
