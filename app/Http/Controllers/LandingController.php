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
use Webp;

class LandingController extends Controller
{
    public function dropzoneHandler(Request $request)
    {
        $action = $request->post('actionDz') ?? "store";
        $path = storage_path('tmp/uploads');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        if ($action == "store") {
            $file = $request->file('file');
            $originalName = $file->getClientOriginalName();
            $name = uniqid() . '_' . trim($originalName);
            $webp = Webp::make($file);
            $webp->save($path."/".$name);
        }

        if ($action == "remove") {
            $name = $request->name;
            $originalName = "";
            if(File::exists($path."/".$name)) {
                File::delete($path."/".$name);
            }
        }

        return response()->json([
            'name'          => $name,
            'original_name' => $originalName,
        ]);
    }

    private function updateData($request, $landing, $customImageName = "image")
    {
        foreach ($landing as $key => $value) {
            $metaKey = $value->meta_key;
            if ($value->meta_type == "image") {
                if ($request->post($metaKey) !== null) {
                    $imageOld = public_path('images/').$value->meta_value;
                    if(File::exists($imageOld)) {
                        File::delete($imageOld);
                    }

                    File::move( storage_path('tmp/uploads/'.$request->post($metaKey)), public_path('images/'.$request->post($metaKey)) );

                    $data = [ 'meta_value' => $request->post($metaKey) ];
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
        $validated = $request->validate([
            'landing_logo' => 'required',
        ]);

        $about = Landing::where('meta_key', 'like', 'landing_logo%')->get();

        $this->updateData($request, $about, "logo");

        return redirect()->route('admin.landing.logo')->with(['success' => 'Data berhasil diubah']);
    }
}
