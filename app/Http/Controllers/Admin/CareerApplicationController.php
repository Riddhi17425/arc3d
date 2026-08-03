<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CareerApplication;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;

class CareerApplicationController extends Controller 
{
    public function index(Request $request){
        return view('admin.career_applications.index');  
    }   

    public function fetchApplications(Request $request)
    {
        $data = CareerApplication::all();
        return DataTables::of($data)
        ->editColumn('message', function ($row) {
            $shortMessage = Str::limit($row->message, 50, '...');
            return '<span title="' . e($row->message) . '">' . e($shortMessage) . '</span>';
        })
        ->addColumn('resume', function ($row) {
            if ($row->resume) {
                $fileName = basename($row->resume);
                $downloadUrl = route('career.resume.download', $fileName);
                return '<a href="'.$downloadUrl.'" class="btn btn-outline-success btn-sm">
                            <i class="icofont-download"></i> Download
                        </a>';
            }
            return '-';
        })
        ->rawColumns(['message', 'resume'])
        ->make(true);
    }

    public function downloadResume($filename)
    {
        $filePath = storage_path('app/public/resumes/' . $filename);
    
        if (!file_exists($filePath)) {
            abort(404);
        }
    
        return Response::download($filePath);
    }


}