<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ClientReview;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Str;
use DataTables;
class ClientReviewController extends Controller
{   
    public function index(){ 
        return view('admin.client_review.index');
    } 
  
    public function createClientRevivew(){
        return view('admin.client_review.create');
    }

    public function ClientRevivewStore(Request $request)
    { 
         
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string|max:255',
            'description'    => 'required|string|max:500',
            'image'    => 'required|file|mimes:jpg,jpeg,png,webp|max:2048',
            'rating'    => 'required|string|max:255',
            'status'  => 'nullable|in:Active,In-Active',
            'alt'     => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please fix the validation errors.');
        }

        $imagePath = ''; 
        // Handle image upload 
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Try with compression first
            $imagePath = storeImage($request->file('image'), 'admin/clinetReviewimage');
            
            if (!$imagePath) {
                return redirect()->back()
                    ->with('error', 'Failed to upload image. Please try again.')
                    ->withInput();
            }
        } 
  
        try {
            $client = ClientReview::create([
                'name'   => $request->name,
                'description'   => $request->description,
                'image' => $imagePath,
                'rating' => $request->rating,
                'status' => $request->status, 
                'alt' => $request->alt,
            ]);
            return redirect()->route('client_revivew')->with('success', 'Client Review created successfully!');
        } catch (\Exception $e) {
            \Log::error('ClientStore error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to create client: ' . $e->getMessage());
        }
    }

    public function getClientRevivewData()
    {
        $client = ClientReview::whereNull('deleted_at')->select([
        'id', 'name',  'description', 'image','rating', 'status', 'alt'
    ])->get();
        return DataTables::of($client)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                
                $editUrl = route('client_revivew.edit', $row->id);
                return '
                    <a href="' . $editUrl . '" class="btn btn-outline-primary btn-sm">
                        <i class="icofont-edit"></i>
                    </a>
                    <button type="button" class="btn btn-outline-danger btn-sm delete_client_review" data-id="' . $row->id . '">
                        <i class="icofont-ui-delete"></i>
                    </button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true); 
    }
    public function EditClientRevivew($id){
        $client_review = ClientReview::find($id);
        return view('admin.client_review.edit' , compact('client_review'));
    }

    public function DestoryClientRevivew($id){
        $client = ClientReview::find($id);
        if(empty($client)){
            return response()->json([ 
                'result' => false,
                "message" => "Client Not Found."
            ]);
        }
        $client->delete();
        return response()->json([
            'result' => true,
            'message' => "Data Deleted."
        ]);
    }


    public function UpdateClientRevivew(Request $request, $id)
    {
        // 1. Validate the request
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string|max:255',
            'description'    => 'required|string|max:500',
            'image'   =>  'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
            'rating'    => 'required|string|max:255',
           
            'status'  => 'nullable|in:Active,In-Active',
            'alt'     => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please correct the highlighted errors.');
        }

        try {
            $client = ClientReview::findOrFail($id); 
            
            $imagePath = $client->image; 
            // Handle image upload 
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                // Try with compression first
                $imagePath = storeImage($request->file('image'), 'admin/clinetReviewimage');
                
                if (!$imagePath) {
                    return redirect()->back()
                        ->with('error', 'Failed to upload image. Please try again.')
                        ->withInput();
                }
            } 

            $client->update([
                'name'   => $request->name,
                'description'   => $request->description,
                'image' => $imagePath,
                'rating' => $request->rating, 
                'status' => $request->status,
               
                'alt' => $request->alt,
            ]);

            return redirect()->route('client_revivew')->with('success', 'Client Review updated successfully!');
        } catch (\Exception $e) {
            \Log::error('Client update failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update client: ' . $e->getMessage());
        }
    }

}
