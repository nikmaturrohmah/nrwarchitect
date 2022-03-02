<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Landing;

class LandingController extends Controller
{
    public function index()
    {
        $landing['slider'] = Landing::where('meta_key', 'like', 'landing_slider_%')->get();
        $landing['aboutus'] = Landing::where('meta_key', 'like', 'landing_about_us_%')->get();
        $landing['contactus'] = Landing::where('meta_key', 'like', 'landing_contact_%')->get();
        $landing['socialmedia'] = Landing::where('meta_key', 'like', 'landing_social_media_%')->get();
        
        return view('landing', ['landing' => $landing]);
    }

    public function detail()
    {
        return view('detail');
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

                    $image = $request->file($metaKey);
                    $extension = $image->getClientOriginalExtension();
                    $name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                    $imageName = "slider" . "-" . Str::slug(date('Y-m-d-h-i-s') . Str::random(8)) . '.' . $extension;
                    $storage = Storage::putFileAs("public/images/", $image, $imageName);

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

        return redirect()->route('adminlanding.admin.slider')->with(['success' => 'Data berhasil diubah']);
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

        return redirect()->route('adminlanding.admin.aboutus')->with(['success' => 'Data berhasil diubah']);
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

        return redirect()->route('adminlanding.admin.contactus')->with(['success' => 'Data berhasil diubah']);
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

        return redirect()->route('adminlanding.admin.socialmedia')->with(['success' => 'Data berhasil diubah']);
    }
}
