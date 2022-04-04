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
        foreach ($request->input('file', []) as $imageName) {
            File::move( storage_path('tmp/uploads/'.$imageName), public_path('images/'.$imageName) );

            $image = [
                'portofolio_id' => $id,
                'image'         => $imageName,
            ];

            PortofolioImage::create($image);
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
        $old = PortofolioImage::find($imageId);

        $imageOld = public_path('images/').$old->image;
        if(File::exists($imageOld)) {
            File::delete($imageOld);
        }

        File::move( storage_path('tmp/uploads/'.$request->post('file')), public_path('images/'.$request->post('file')) );
        $data = [ 'image' => $request->post('file') ];

        PortofolioImage::where('id', $imageId)->update($data);
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
