<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Landing;
use App\Models\PortofolioCategory;
use App\Models\Portofolio;

class DetailController extends Controller
{
    public function index($id)
    {
        $landing['logo'] = Landing::where('meta_key', 'like', 'landing_logo%')->get();
        $landing['slider'] = Landing::where('meta_key', 'like', 'landing_slider_%')->get();
        $landing['aboutus'] = Landing::where('meta_key', 'like', 'landing_about_us_%')->get();
        $landing['contactus'] = Landing::where('meta_key', 'like', 'landing_contact_%')->get();
        $landing['socialmedia'] = Landing::where('meta_key', 'like', 'landing_social_media_%')->get();
        $portofolio = Portofolio::with([
            'images', 
            'category',
            'tags',
            'specificationBuilding',
            'specificationInterior'
        ])->where('id', $id)->first();
        
        //return response()->json($portofolio);

        return view('detail', [
            'landing'       => $landing,
            'portofolio'    => $portofolio,
        ]);
    }
}
