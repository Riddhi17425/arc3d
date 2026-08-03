<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Services;
use App\Models\Industries;
use App\Models\Printing;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Str;
use DataTables;
class PrintingController extends Controller
{
    public function index(){ 
        return view('admin.printing.index'); 
    }

    public function create(){
        $data['services'] = Services::where('status','Active')->get();
        $data['industries'] = Industries::where('status','Active')->get();
        return view('admin.printing.create' , compact('data'));
    }
 
   public function Store(Request $request)
    {
        // Validate input
        $validator = Validator::make($request->all(), [ 
            'printing_desc'    => 'required|string',
            'url'    => 'required|string', 
            'industries' => 'required|array',
            'printing_title'   => 'required|string|max:255|unique:printing,title', 
            'printing_status'  => 'nullable|in:Active,In-Active',
            'printing_alt'     => 'required|string|max:255',
            'printing_image'   => 'required|file|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'printing_material_desc'    => 'required|string',
            'printing_technology_desc'    => 'required|string',
            'printing_btob_desc'    => 'required|string',

        ]);
  
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please fix the validation errors.');
        }
        try {
            $imagePath = null;
            if ($request->hasFile('printing_image') && $request->file('printing_image')->isValid()) {
                $imagePath = storeImage($request->file('printing_image'), 'admin/printing_image');
                if (!$imagePath) {
                    return redirect()->back()
                        ->with('error', 'Failed to upload image. Please try again.')
                        ->withInput();
                }
            }  

            
            // Create printing record (Correct field names)
            Printing::create([
                'title'       => $request->printing_title,
                'description' => $request->printing_desc,
                'status'      => $request->printing_status ?? 'Active',
                'alt_tag'     => $request->printing_alt,
                'url'           => $request->url,
                'image'       => $imagePath,
                'industires'       => json_encode($request->industries, true),
                'printing_material_desc' => $request->printing_material_desc,
                'printing_technology_desc' => $request->printing_technology_desc,
                'printing_btob_desc' => $request->printing_btob_desc,

            ]);

            return redirect()->route('printing')->with('success', 'Record added successfully!');
        } catch (\Exception $e) {
            \Log::error('printing Store Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to save: ' . $e->getMessage());
        }
    }   

    public function getData() 
    {
        $printing = Printing::whereNull('deleted_at')->get();
        return DataTables::of($printing)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                
                $editUrl = route('printing.edit', $row->id);
                return '
                    <a href="' . $editUrl . '" class="btn btn-outline-primary btn-sm">
                        <i class="icofont-edit"></i>
                    </a>
                    <button type="button" class="btn btn-outline-danger btn-sm delete_printing" data-id="' . $row->id . '">
                        <i class="icofont-ui-delete"></i>
                    </button>
                '; 
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function Edit($id){
        $printing = Printing::find($id);
        $data['industries'] = Industries::where('status','Active')->get();
        return view('admin.printing.edit' , compact('printing' , 'data'));
    }

    public function Destory($id){
        $printing = Printing::find($id);
        if(empty($printing)){
            return response()->json([
                'result' => false, 
                "message" => "Data Not Found."
            ]);
        }
        $printing->delete();
        return response()->json([
            'result' => true,
            'message' => "Data Deleted."
        ]);
    }


    public function Update(Request $request, $id)
    { 
        // dd($request->all());
        // 1. Validate the request
        $validator = Validator::make($request->all(), [
            'printing_desc'    => 'required|string',
            'url'    => 'required|string',
            'printing_title'   => 'required|string|max:255|unique:printing,title,' . $id,
            'printing_status'  => 'required|in:Active,In-Active',
            'printing_alt'     => 'required|string|max:255',
            'printing_image'   => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
            'industries' =>     'required|array',

            'printing_material_desc'    => 'nullable|string',
            'printing_technology_desc'    => 'nullable|string',
            'printing_btob_desc'    => 'nullable|string',
        ]); 

        if ($validator->fails()) { 
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please correct the highlighted errors.');
        }

        try {
            // 2. Find the printing
            $printing = Printing::findOrFail($id);

            $imagePath = $printing->image;

            if ($request->hasFile('printing_image') && $request->file('printing_image')->isValid()) {
                $imagePath = storeImage($request->file('printing_image'), 'admin/printing_image');
                if (!$imagePath) {
                    return redirect()->back()
                        ->with('error', 'Failed to upload image. Please try again.')
                        ->withInput();
                }
            } 
            
            // 4. Update printing data
            $printing->update([
                'title'       => $request->printing_title,
                'description' => $request->printing_desc,
                'status'      => $request->printing_status,
                'alt_tag'     => $request->printing_alt,
                'url'     => $request->url,
                'image'       => $imagePath,
                'industires'       => json_encode($request->industries, true),
                'printing_material_desc' => $request->printing_material_desc,
                'printing_technology_desc' => $request->printing_technology_desc,
                'printing_btob_desc' => $request->printing_btob_desc,

            ]);

            return redirect()->route('printing')->with('success', 'printing updated successfully!');
        } catch (\Exception $e) {
            \Log::error('printing update failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update printing: ' . $e->getMessage());
        }
    }

}
 