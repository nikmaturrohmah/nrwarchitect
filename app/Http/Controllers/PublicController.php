<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Landing;
use App\Models\PortofolioCategory;
use App\Models\Portofolio;
use App\Models\Testimonial;
use App\Models\Slider;
use App\Models\Article;

class PublicController extends Controller
{
    public function index()
    {
        $landing['logo']        = Landing::where('meta_key', 'like', 'landing_logo%')->get();
        $landing['slider']      = Landing::where('meta_key', 'like', 'landing_slider_%')->get();
        $landing['aboutus']     = Landing::where('meta_key', 'like', 'landing_about_us_%')->get();
        $landing['contactus']   = Landing::where('meta_key', 'like', 'landing_contact_%')->get();
        $landing['socialmedia'] = Landing::where('meta_key', 'like', 'landing_social_media_%')->get();
        $landing['category']    = PortofolioCategory::get();
        $portofolio = Portofolio::with(['images', 'category'])
                                ->paginate(9);
        $landing['portofolio']  = $portofolio;

        $landing['testimonial'] = Testimonial::where('posted', 1)
                                    ->orderBy('id','DESC')
                                    ->skip(0)
                                    ->take(3)
                                    ->get();
        $slider = Slider::where('posted', true)
                    ->orderBy('id','DESC')
                    ->skip(0)
                    ->take(3)
                    ->get();
        $landing['article'] = Article::where('posted', 1)
                    ->orderBy('id','DESC')
                    ->skip(0)
                    ->take(3)
                    ->get();
        
        return view('landing', ['landing' => $landing, 'slider' => $slider]);
    }

    public function portofolio()
    {
        $landing['logo']        = Landing::where('meta_key', 'like', 'landing_logo%')->get();
        $landing['slider']      = Landing::where('meta_key', 'like', 'landing_slider_%')->get();
        $landing['aboutus']     = Landing::where('meta_key', 'like', 'landing_about_us_%')->get();
        $landing['contactus']   = Landing::where('meta_key', 'like', 'landing_contact_%')->get();
        $landing['socialmedia'] = Landing::where('meta_key', 'like', 'landing_social_media_%')->get();
        $landing['category']    = PortofolioCategory::get();
        $portofolio = Portofolio::with(['images', 'category'])
                                ->paginate(9);
        $landing['portofolio']  = $portofolio;

        $landing['testimonial'] = Testimonial::where('posted', 'published')
                                    ->orderBy('id','DESC')
                                    ->skip(0)
                                    ->take(3)
                                    ->get();
        $slider = Slider::where('posted', true)
                    ->orderBy('id','DESC')
                    ->skip(0)
                    ->take(3)
                    ->get();
        
        return view('list', ['landing' => $landing, 'slider' => $slider]);
    }

    public function portofolioDetail($id)
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

        $last = Portofolio::with('images')
                            ->orderBy('id','DESC')
                            ->skip(0)
                            ->take(4)
                            ->get();
                            
        return view('detail', [
            'landing'       => $landing,
            'portofolio'    => $portofolio,
            'last'          => $last,
        ]);
    }

    public function article()
    {
        $landing['logo'] = Landing::where('meta_key', 'like', 'landing_logo%')->get();
        $landing['socialmedia'] = Landing::where('meta_key', 'like', 'landing_social_media_%')->get();
        $landing['article'] = Article::where('posted', true)->paginate(9);
        
        return view('article', ['landing' => $landing]);
    }

    public function articleDetail($slug)
    {
        $landing['logo'] = Landing::where('meta_key', 'like', 'landing_logo%')->get();
        $landing['socialmedia'] = Landing::where('meta_key', 'like', 'landing_social_media_%')->get();
        $article = Article::with('tags')->where('slug_title', $slug)->first();
        
        return view('articledetail', ['landing' => $landing, 'article' => $article]);
    }

    public function articleSearch(Request $request)
    {
        $landing['logo'] = Landing::where('meta_key', 'like', 'landing_logo%')->get();
        $landing['socialmedia'] = Landing::where('meta_key', 'like', 'landing_social_media_%')->get();
        $article = Article::where('posted', true)
                            ->where('title', 'like', '%'.$request->get('q').'%')
                            ->paginate(9)
                            ->appends(request()->query());

        $landing['article'] = $article;
        $landing['q'] = $request->get('q');

        return view('searcharticle', ['landing' => $landing]);
    }
}
