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

class LandingController extends Controller
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

        //dd($landing['portofolio']);
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
        
        return view('landing', ['landing' => $landing, 'slider' => $slider]);
    }

    public function list()
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

        //dd($landing['portofolio']);
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

    public function gg()
    {
        return view('landing2');
    }

    public function detail()
    {
        $landing['logo'] = Landing::where('meta_key', 'like', 'landing_logo%')->get();
        $landing['socialmedia'] = Landing::where('meta_key', 'like', 'landing_social_media_%')->get();
        
        return view('detail', ['landing' => $landing]);
    }

    public function adminIndex()
    {
        return response()->json(Landing::get());
        return view('admin.landing.index');
    }

    private function updateData($request, $landing, $customImageName = "image")
    {
        foreach ($landing as $key => $value) {
            $metaKey = $value->meta_key;

            if ($value->meta_type == "image") {
                if ($request->hasfile($metaKey)) {
                    $request->validate([
                        $metaKey => 'image|mimes:jpeg,png,jpg,gif,svg',
                    ]);

                    $imageOld = public_path('images/').$value->meta_value;
                    if(File::exists($imageOld)) {
                        File::delete($imageOld);
                    }

                    $image = $request->file($metaKey);
                    $extension = $image->getClientOriginalExtension();
                    $name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                    $imageName = $customImageName . "-" . Str::slug(date('Y-m-d-h-i-s') . Str::random(8)) . '.' . $extension;
                    
                    //$storage = Storage::putFileAs("public/images/", $image, $imageName);
                    $image->move(public_path('images/'), $imageName);

                    $data = [ 'meta_value' => $imageName ];
                }
            } else {
                $data = [ 'meta_value' => $request->post($metaKey) ];
            }

            if ($data != null) {
                Landing::where('id', $value->id)
                    ->update($data);
            }

            $data = null;
        }
    }

    public function adminSlider()
    {
        $slider = Landing::where('meta_key', 'like', 'landing_slider_%')->get();
        return view('admin.landing.slider', ['slider' => $slider]);
    }

    public function adminSliderUpdate($number, Request $request)
    {
        $slider = Landing::where('meta_key', 'like', 'landing_slider_product_'.$number.'_%')->get();

        $this->updateData($request, $slider, "slider");

        return redirect()->route('admin.landing.slider')->with(['success' => 'Data berhasil diubah']);
    }

    public function adminAboutus()
    {   
        $about = Landing::where('meta_key', 'like', 'landing_about_us_%')->get();
        return view('admin.landing.about_us', ['about' => $about]);
    }

    public function adminAboutusUpdate(Request $request)
    {
        $about = Landing::where('meta_key', 'like', 'landing_about_us_%')->get();

        $this->updateData($request, $about, "about");

        return redirect()->route('admin.landing.aboutus')->with(['success' => 'Data berhasil diubah']);
    }

    public function adminContactus()
    {
        $contact = Landing::where('meta_key', 'like', 'landing_contact_%')->get();
        return view('admin.landing.contact_us', ['contact' => $contact]);
    }

    public function adminContactusUpdate(Request $request)
    {
        $contact = Landing::where('meta_key', 'like', 'landing_contact_%')->get();

        $this->updateData($request, $contact);

        return redirect()->route('admin.landing.contactus')->with(['success' => 'Data berhasil diubah']);
    }

    public function adminSocialmedia()
    {
        $socialMedia = Landing::where('meta_key', 'like', 'landing_social_media_%')->get();
        return view('admin.landing.social_media', ['socialMedia' => $socialMedia]);
    }

    public function adminSocialmediaUpdate(Request $request)
    {
        $socialMedia = Landing::where('meta_key', 'like', 'landing_social_media_%')->get();

        $this->updateData($request, $socialMedia);

        return redirect()->route('admin.landing.socialmedia')->with(['success' => 'Data berhasil diubah']);
    }

    public function adminLogo()
    {
        $logo = Landing::where('meta_key', 'like', 'landing_logo%')->get();
        return view('admin.landing.logo', ['logo' => $logo]);
    }

    public function adminLogoUpdate(Request $request)
    {
        $about = Landing::where('meta_key', 'like', 'landing_logo%')->get();

        $this->updateData($request, $about, "logo");

        return redirect()->route('admin.landing.logo')->with(['success' => 'Data berhasil diubah']);
    }
}
