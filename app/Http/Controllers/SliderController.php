<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Slider;
use App\Models\Portofolio;
use App\Models\PortofolioCategory;
use App\Models\PortofolioImage;


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
        //return response()->json($request->file->getClientOriginalName());
        $imageName = "slider-".time().'.'.$request->file->extension();
        $request->file->move(public_path('images'), $imageName);

        $newData = [
            'title'         => $request->post('title'),
            'description'   => $request->post('description'),
            'image'   => $imageName,
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

        if ($request->hasFile('file')) {

            $imagePath = public_path('images/').$old->image;
            if(File::exists($imagePath)) {
                File::delete($imagePath);
            }

            $imageName = "slider-".time().'.'.$request->file->extension();
            $request->file->move(public_path('images'), $imageName);

            $dataUpdate = array_merge($dataUpdate, ['image' => $imageName]);
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
        $slider = Slider::where('posted', true)->get();

        if (sizeof($slider) >= 3) {
            return redirect()->route('admin.landing.slider.index')->with(['error' => 'Jumlah slider untuk di publish sudah maksimal']);
        }

        $dataUpdate = [
            'posted'  => true,
        ];

        Slider::where('id', $id)->update($dataUpdate);
        return redirect()->route('admin.landing.slider.index')->with(['success' => 'Data berhasil di post']);
    }

    public function draft($id)
    {
        $slider = Slider::where('posted', false)->get();

        if (sizeof($slider) <= 3) {
            return redirect()->route('admin.landing.slider.index', $id)->with(['error' => 'Jumlah slider untuk di ditampilkan kurang']);
        }

        $dataUpdate = [
            'posted'  => false,
        ];

        Slider::where('id', $id)->update($dataUpdate);
        return redirect()->route('admin.landing.slider.index')->with(['success' => 'Data berhasil di post']);
    }
}
