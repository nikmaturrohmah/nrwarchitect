<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $data['portofolio']     = DB::table('portofolios')->count();
        $data['image']          = DB::table('portofolio_images')->count();
        $data['testimonial']    = DB::table('testimonials')->count();

        return view('admin.dashboard', ['data'  => $data]);
    }
}
