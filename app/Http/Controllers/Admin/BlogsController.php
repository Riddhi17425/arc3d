<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Blogs;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Str;
use DataTables;
class BlogsController extends Controller
{ 
    public function index(){
        return view('admin.blogs.index');
    }

    public function createBlogs(){
        return view('admin.blogs.create');
    }

    public function BlogsStore(Request $request)
    {
        // Step 1: Validation
        $validator = Validator::make($request->all(), [
            'title'               => 'required|string',
            'short_description'   => 'required|string',
            'detail_description'  => 'required|string',
            'meta_title'  => 'required|string',
            'meta_description'  => 'required|string',
           
            'date'                => 'nullable',
            'url'                 => 'required|string',
            'front_image'         => 'required|file',
            'front_image_alt'     =>  'required',
            'detail_image_alt'     =>  'required',
            'detail_image'        => 'required|file',
            'faq_title.*' => 'required|string',
            'faq_description.*' => 'required|string',
            'status'              => 'required|in:Active,In-Active',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please fix the validation errors.');
        }
        
        $faqTitles = $request->faq_title ?? [];
        $faqDescriptions = $request->faq_description ?? [];
    
        $title_description = [];
        foreach ($faqTitles as $index => $title) {
            $title_description[] = [
                'faq_title' => $title,
                'faq_description' => $faqDescriptions[$index],
            ];
        }
        
        try {
            $frontImagePath = '';
            // Handle image upload 
            if ($request->hasFile('front_image') && $request->file('front_image')->isValid()) {
                // Try with compression first
                $frontImagePath = storeImage($request->file('front_image'), 'admin/blogs/front_image');
                
                if (!$frontImagePath) {
                    return redirect()->back()
                        ->with('error', 'Failed to upload image. Please try again.')
                        ->withInput();
                }
            }

            $detailImagePath = '';
            // Handle image upload 
            if ($request->hasFile('detail_image') && $request->file('detail_image')->isValid()) {
                // Try with compression first
                $detailImagePath = storeImage($request->file('detail_image'), 'admin/blogs/detail_image');
                
                if (!$detailImagePath) {
                    return redirect()->back()
                        ->with('error', 'Failed to upload image. Please try again.')
                        ->withInput();
                }
            }

            $ctaImagePath = '';
            // Handle image upload 
            if ($request->hasFile('cta_image') && $request->file('cta_image')->isValid()) {
                // Try with compression first
                $ctaImagePath = storeImage($request->file('cta_image'), 'admin/blogs/cta_image');
                
                if (!$ctaImagePath) {
                    return redirect()->back()
                        ->with('error', 'Failed to upload image. Please try again.')
                        ->withInput();
                }
            }

            // Step 4: Store in DB
            Blogs::create([
                'title'              => $request->title,
                'short_description'  => $request->short_description,
               
                'detail_description' => $request->detail_description,
                'date'               => date('Y-m-d', strtotime($request->input('date'))),
                'url'                => $request->url,
                'status'             => $request->status ?? 'Active',
                'front_image'        => $frontImagePath,
                'detail_image'       => $detailImagePath,
                'detail_image_alt'  => $request->detail_image_alt,
                'front_image_alt'  => $request->front_image_alt,
                'meta_title'       => $request->meta_title,
                'meta_description'       => $request->meta_description,
                'title_description' => $title_description, 
            ]); 
            return redirect()->route('blogs')->with('success', 'Blogs created successfully!');
        } catch (\Exception $e) {
            \Log::error('BlogsStore error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to create blogs: ' . $e->getMessage());
        }
    }

    public function getBlogsData()
    {
       $blogs = Blogs::whereNull('deleted_at')->get();
         
        return DataTables::of($blogs)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                
                $editUrl = route('blogs.edit', $row->id);
                return '
                    <a href="' . $editUrl . '" class="btn btn-outline-primary btn-sm">
                        <i class="icofont-edit"></i>
                    </a>
                    <button type="button" class="btn btn-outline-danger btn-sm delete_blogs" data-id="' . $row->id . '">
                        <i class="icofont-ui-delete"></i>
                    </button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function EditBlogs($id){
        $blogs = Blogs::find($id);
        return view('admin.blogs.edit',compact('blogs'));
    }

    public function DestoryBlogs($id){
        $blogs = Blogs::find($id);
        if(empty($blogs)){
            return response()->json([
                'result' => false,
                "message" => "Product Not Found."
            ]);
        }
        $blogs->delete();
        return response()->json([
            'result' => true,
            'message' => "Data Deleted."
        ]);
    }


    public function UpdateBlogs(Request $request, $id)
    { 
        
        // Step 1: Validation
        $validator = Validator::make($request->all(), [
            'title'               => 'required|string',
            'short_description'   => 'required|string',
            'detail_description'  => 'required|string',
            'meta_title'  => 'required|string',
            'meta_description'  => 'required|string',
            'date'                => 'nullable',
            'url'                 => 'required|string',
            'front_image'         => 'nullable|file',
            'detail_image'        => 'nullable|file',
            'status'              => 'required|in:Active,In-Active',
            'front_image_alt'     =>  'required',
            'detail_image_alt'     =>  'required',
            'faq_title.*' => 'required|string',
            'faq_description.*' => 'required|string',
        ]); 

        if ($validator->fails()) {
            
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please fix the validation errors.');
        }

        try {
            // Step 2: Find existing record
            $blogs = Blogs::findOrFail($id);
            
            $faqTitles = $request->faq_title;
            $faqDescriptions = $request->faq_description;
        
            $title_description = [];
            foreach ($faqTitles as $index => $title) {
                $title_description[] = [
                    'faq_title' => $title,
                    'faq_description' => $faqDescriptions[$index],
                ];
            }
            $frontImagePath = $blogs->front_image;
            // return 1;
            // Handle image upload 
            if ($request->hasFile('front_image') && $request->file('front_image')->isValid()) {
                // Try with compression first
                $frontImagePath = storeImage($request->file('front_image'), 'admin/blogs/front_image');
                 
                if (!$frontImagePath) {
                    return redirect()->back()
                        ->with('error', 'Failed to upload image. Please try again.')
                        ->withInput();
                }
            }

            $detailImagePath = $blogs->detail_image;
            // Handle image upload 
            if ($request->hasFile('detail_image') && $request->file('detail_image')->isValid()) {
                // Try with compression first
                $detailImagePath = storeImage($request->file('detail_image'), 'admin/blogs/detail_image');
                
                if (!$detailImagePath) {
                    return redirect()->back()
                        ->with('error', 'Failed to upload image. Please try again.')
                        ->withInput();
                }
            }

           
            // Step 5: Update in DB
            // return 1;
            $blogs->update([
                'title'              => $request->title,
                'short_description'  => $request->short_description,
                'detail_description' => $request->detail_description,
                'conclusion'         => $request->conclusion,
                'date'               => date('Y-m-d', strtotime($request->input('date'))) ?? null,
                'url'                => $request->url,
                'status'             => $request->status ?? 'Active',
                'front_image'        => $frontImagePath,
                'detail_image'       => $detailImagePath,
                'detail_image_alt'  => $request->detail_image_alt,
                'front_image_alt'  => $request->front_image_alt,
                'meta_title'       => $request->meta_title,
                'meta_description'       => $request->meta_description,
                'title_description' => $title_description,
            ]);
            return redirect()->route('blogs')->with('success', 'Blogs updated successfully!');
        } catch (\Exception $e) {
            \Log::error('BlogsUpdate error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update blogs: ' . $e->getMessage());
        }
    }

} 
