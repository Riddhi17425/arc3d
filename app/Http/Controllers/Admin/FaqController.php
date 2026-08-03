<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Faq;
use DataTables;

class FaqController extends Controller
{
    public function index(){
        return view('admin.faq.index');
    } 

    public function create(){
        return view('admin.faq.create');
    }

    public function Store(Request $request)
{
    // Validate input
    $validator = Validator::make($request->all(), [
        'faq_url'    => 'required|string|max:500',
        'title.*' => 'required|string',
        'description.*' => 'required|string',
        'status'  => 'nullable|in:Active,In-Active',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput()
            ->with('error', 'Please fix the validation errors.');
    }

    $titles = $request->title;
    $descriptions = $request->description;

    $title_description = [];
    foreach ($titles as $index => $title) {
        $title_description[] = [
            'title' => $title,
            'description' => $descriptions[$index],
        ];
    }

    try {

        Faq::create([
            'faq_url' => $request->faq_url,
            'title_description' => $title_description, 
            // 'title_description' => json_encode($title_description), 
            'status'      => $request->status ?? 'Active',
            
        ]);

        return redirect()->route('faq')->with('success', 'Record added successfully!');
    } catch (\Exception $e) {
        \Log::error('faq Store Error: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Failed to save: ' . $e->getMessage());
    }
}   

    public function getData()
    {
        $faq = Faq::whereNull('deleted_at')->get();

        return DataTables::of($faq)
            ->addIndexColumn()
            ->addColumn('title_descriptions', function ($row) {
                $titleDescription = is_array($row->title_description) 
                    ? $row->title_description 
                    : json_decode($row->title_description, true);

                $titleString = '';
                if (!empty($titleDescription) && is_array($titleDescription)) {
                    $titles = array_column($titleDescription, 'title');
                    $descriptions = array_column($titleDescription, 'description');
                    $titleString = implode(' - ', $titles) . ' | ' . implode(' / ', $descriptions);
                }
                return $titleString;
            })
            ->addColumn('action', function ($row) { 
                $editUrl = route('faq.edit', $row->id);
                return '
                    <a href="' . $editUrl . '" class="btn btn-outline-primary btn-sm">
                        <i class="icofont-edit"></i>
                    </a>
                    <button type="button" class="btn btn-outline-danger btn-sm delete_faq" data-id="' . $row->id . '">
                        <i class="icofont-ui-delete"></i>
                    </button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function Edit($id){
        $faq = Faq::find($id);
        return view('admin.faq.edit' , compact('faq'));
    }

    public function Destory($id){
        $faq = Faq::find($id);
        if(empty($faq)){
            return response()->json([
                'result' => false,
                "message" => "Faq Not Found."
            ]);
        }
        $faq->delete();
        return response()->json([
            'result' => true,
            'message' => "Data Deleted."
        ]);
    }


    public function Update(Request $request, $id)
{
    // Validate the input data
    $validator = Validator::make($request->all(), [
        'faq_url' => 'required|string|max:500',
        'title.*' => 'required|string',
        'description.*' => 'required|string',
        'status'  => 'nullable|in:Active,In-Active',
    ]);

    // If validation fails, redirect back with errors
    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput()
            ->with('error', 'Please fix the validation errors.');
    }

   
    $faq = Faq::findOrFail($id);  // Using findOrFail to ensure it exists

    $titles = $request->title;
    $descriptions = $request->description;

    $title_description = [];
    foreach ($titles as $index => $title) {
        $title_description[] = [
            'title' => $title,
            'description' => $descriptions[$index],
        ];
    }

    try {

        $faq->update([
            'faq_url' => $request->faq_url,
            'title_description' => $title_description,
            'status' => $request->status ?? 'Active',
        ]);


        return redirect()->route('faq')->with('success', 'FAQ updated successfully!');
    } catch (\Exception $e) {
        // If an error occurs, log it and redirect with an error message
        \Log::error('FAQ update failed: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Failed to update FAQ: ' . $e->getMessage());
    }
}

}
