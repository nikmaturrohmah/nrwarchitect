<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Portofolio;
use App\Models\PortofolioCategory;
use App\Models\PortofolioImage;
use App\Models\PortofolioTags;
use App\Models\PortofolioBuilding;
use App\Models\PortofolioInterior;
use Webp;

class PortofolioController extends Controller
{
    public function index()
    {
        $portofolio = Portofolio::with('category')->get();
        return view('admin.portofolio.index', ['portofolio' => $portofolio]);
    }

    public function create()
    {
        $category = PortofolioCategory::get();
        return view('admin.portofolio.create', ['category' => $category]);
    }

    public function store(Request $request)
    {
        $portofolio = [
            'portofolio_category_id'    => $request->portofolio_category_id,
            'name'                      => $request->name,
            'description'               => $request->description,
        ];

        $portofolio = Portofolio::create($portofolio);

        if ($request->portofolio_category_id == 1) {
            $building = [
                'portofolio_id'     => $portofolio->id,
                "bathroom"          => $request->bathroom,
                "bedroom"           => $request->bedroom,
                "building_length"   => $request->building_length,
                "building_width"    => $request->building_width,
                "land_length"       => $request->land_length,
                "land_width"        => $request->land_width,
                "floor"             => $request->floor,
                'page_area'         => $request->page_area,
                'building_area'     => $request->building_area,
            ];

            PortofolioBuilding::create($building);
        }

        if ($request->portofolio_category_id == 2) {
            $interior = [
                'portofolio_id' => $portofolio->id,
                "room_length"   => $request->room_length,
                "room_width"    => $request->room_width,
                "style"         => $request->style,
                "type"          => $request->type,
                "room_area"     => $request->room_area,
            ];

            PortofolioInterior::create($interior);
        }

        foreach ($request->input('file', []) as $imageName) {
            File::move( storage_path('tmp/uploads/'.$imageName), public_path('images/'.$imageName) );

            $image = [
                'portofolio_id' => $portofolio->id,
                'image'         => $imageName,
            ];

            PortofolioImage::create($image);
        }

        $tags = json_decode($request->tags);

        foreach ($tags as $key => $value) {
            $tag = [
                'portofolio_id' => $portofolio->id,
                'tag'           => $value->value,
            ];
    
            PortofolioTags::create($tag);
        }

        return redirect()->route('admin.portofolio.index')->with(['success' => 'Data berhasil diubah']);
    }

    public function edit($id)
    {
        $portofolio = Portofolio::find($id);
        $category = PortofolioCategory::get();
        return view('admin.portofolio.edit', ['portofolio' => $portofolio, 'category' => $category]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'portofolio_category_id'    => 'required',
            'name'                      => 'required',
            'description'               => 'required',
        ]);

        $dataUpdate = [
            'portofolio_category_id'    => $request->portofolio_category_id,
            'name'                      => $request->name,
            'description'               => $request->description,
        ];

        Portofolio::where('id', $id)->update($dataUpdate);
        return redirect()->route('admin.portofolio.index')->with(['success' => 'Data berhasil diubah']);
    }

    public function detail($id)
    {
        $portofolio = Portofolio::with(['category', 'images', 'tags'])->find($id);
        $category = PortofolioCategory::get();
        
        return view('admin.portofolio.detail', ['portofolio' => $portofolio, 'category' => $category, ]);
    }

    public function delete($id)
    {
        $portofolio = Portofolio::find($id);
        $portofolio->delete();
        
        return redirect()->route('admin.portofolio.index')->with(['success' => 'Data berhasil dihapus']);
    }
}
