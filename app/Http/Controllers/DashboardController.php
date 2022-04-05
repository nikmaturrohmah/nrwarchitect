<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    public function index()
    {
        $data['portofolio']     = DB::table('portofolios')->count();
        $data['image']          = DB::table('portofolio_images')->count();
        $data['testimonial']    = DB::table('testimonials')->count();

        return view('admin.dashboard', ['data'  => $data]);
    }

    public function clearTmp()
    {
        try {
            $response = File::deleteDirectory(storage_path('tmp/uploads'));
        } catch (\Throwable $th) {
            throw $th;
        }

        return response()->json($response);
    }
}
