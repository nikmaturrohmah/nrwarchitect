<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Slider;
use App\Models\Portofolio;
use App\Models\PortofolioCategory;
use App\Models\PortofolioImage;
use Webp;

class SliderController extends Controller
{
    public function index()
    {
        $slider = Slider::get();
        return view('admin.landing.slider.index', ['slider' => $slider]);
    }

    public function create()
    {
        return view('admin.landing.slider.create');
    }

    public function store(Request $request)
    {
        File::move( storage_path('tmp/uploads/'.$request->post('file')), public_path('images/'.$request->post('file')) );

        $newData = [
            'title'         => $request->post('title'),
            'description'   => $request->post('description'),
            'image'   => $request->post('file'),
            'posted'  => false,
        ];

        Slider::create($newData);

        return redirect()->route('admin.landing.slider.index')->with(['success' => 'Data berhasil dibuat']);
    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.landing.slider.edit',  ['slider'=> $slider]);
    }

    public function update($id, Request $request)
    {
        $dataUpdate = [
            'title'         => $request->post('title'),
            'description'   => $request->post('description'),
            'posted'  => false,
        ];

        $old = Slider::find($id);

        if ($request->post('file') !== null) {
            $imageOld = public_path('images/').$old->image;
            if(File::exists($imageOld)) {
                File::delete($imageOld);
            }
    
            File::move( storage_path('tmp/uploads/'.$request->post('file')), public_path('images/'.$request->post('file')) );
            $dataUpdate = array_merge($dataUpdate, ['image' => $request->post('file')]);
        }

        Slider::where('id', $id)->update($dataUpdate);
        return redirect()->route('admin.landing.slider.index')->with(['success' => 'Data berhasil diubah']);
    }

    public function delete($id)
    {
        $image = Slider::find($id);
        $image->delete();

        $imagePath = public_path('images/').$image->image;
        if(File::exists($imagePath)) {
            File::delete($imagePath);
        }
        
        return redirect()->route('admin.landing.slider.index')->with(['success' => 'Data berhasil dihapus']);
    }

    public function publish($id)
    {
        $dataUpdate = [
            'posted'  => true,
        ];

        Slider::where('id', $id)->update($dataUpdate);
        return redirect()->route('admin.landing.slider.index')->with(['success' => 'Data berhasil di post']);
    }

    public function draft($id)
    {
        $dataUpdate = [
            'posted'  => false,
        ];

        Slider::where('id', $id)->update($dataUpdate);
        return redirect()->route('admin.landing.slider.index')->with(['success' => 'Data berhasil di draft']);
    }
}
