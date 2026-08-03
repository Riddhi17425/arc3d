<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductMaster;
use App\Models\Inquiry;
use App\Models\Application;

class DashboardController extends Controller
{
    public function index(){

        
        return view("admin.dashboard.index");
    }
}
