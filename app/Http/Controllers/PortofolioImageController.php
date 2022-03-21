<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Portofolio;
use App\Models\PortofolioCategory;
use App\Models\PortofolioImage;
use Webp;

class PortofolioImageController extends Controller
{
    public function create($id)
    {
        $portofolio = Portofolio::find($id);
        return view('admin.portofolio.image.create', ['portofolio' => $portofolio]);
    }

    public function store($id, Request $request)
    {
        foreach ($request->file as $key => $value) {
            $imageName = "portofolio-".rand(1000, 9999).time().'.'.$value->extension();
            $webp = Webp::make($value);

            if ($webp->save(public_path('images/'.$imageName))) {
                $image = [
                    'portofolio_id' => $id,
                    'image'         => $imageName,
                ];
    
                PortofolioImage::create($image);
            }
        }

        return redirect()->route('admin.portofolio.detail', $id)->with(['success' => 'Data berhasil dibuat']);
    }

    public function edit($imageId)
    {
        $image = PortofolioImage::find($imageId);
        $portofolio = Portofolio::where('id', $image->portofolio_id )->first();
        return view('admin.portofolio.image.edit',  ['portofolio'=> $portofolio,'image' => $image]);
    }

    public function update($imageId, Request $request)
    {
        $dataUpdate = [];
        $old = PortofolioImage::find($imageId);

        if ($request->hasFile('image')) {

            $imagePath = public_path('images/').$old->image;
            if(File::exists($imagePath)) {
                File::delete($imagePath);
            }

            $imageName = "slider-".rand(1000, 9999).time().'.'.$request->image->extension();

            $webp = Webp::make($request->image);

            if ($webp->save(public_path('images/'.$imageName))) {
                $dataUpdate = array_merge($dataUpdate, ['image' => $imageName]);
            }
        }

        PortofolioImage::where('id', $imageId)->update($dataUpdate);
        return redirect()->route('admin.portofolio.detail', $old->portofolio_id)->with(['success' => 'Data berhasil diubah']);
    }

    public function delete($imageId)
    {
        $image = PortofolioImage::find($imageId);
        $image->delete();

        $imagePath = public_path('images/').$image->image;
        if(File::exists($imagePath)) {
            File::delete($imagePath);
        }
        
        return redirect()->route('admin.portofolio.detail', $image->portofolio_id)->with(['success' => 'Data berhasil dihapus']);
    }
}
