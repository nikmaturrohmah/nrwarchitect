<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portofolio;
use App\Models\PortofolioCategory;
use App\Models\PortofolioImage;
use App\Models\PortofolioBuilding;
use App\Models\PortofolioInterior;

class PortofolioSpecificationController extends Controller
{
    public function create($id)
    {
        $portofolio = Portofolio::find($id);
        return view('admin.portofolio.spesifikasi.create', ['portofolio' => $portofolio]);
    }

    public function store($id, Request $request)
    {
        $portofolio = Portofolio::find($id);
        if ($portofolio->portofolio_category_id == 1) {
            $request->validate([
                'land_length'       => 'required',
                'land_width'        => 'required',
                'building_length'   => 'required',
                'building_width'    => 'required',
                'floor'             => 'required',
                'bedroom'           => 'required',
                'bathroom'          => 'required',
                'page_area'         => 'required',
                'building_area'     => 'required',
            ]);
    
            $newData = [
                'portofolio_id'     => $id,
                'land_length'       => $request->land_length,
                'land_width'        => $request->land_width,
                'building_length'   => $request->building_length,
                'building_width'    => $request->building_width,
                'floor'             => $request->floor,
                'bedroom'           => $request->bedroom,
                'bathroom'          => $request->bathroom,
                'page_area'         => $request->page_area,
                'building_area'     => $request->building_area,
            ];

            PortofolioBuilding::create($newData);
        } else {
            $request->validate([
                'type'          => 'required',
                'style'         => 'required',
                'room_length'   => 'required',
                'room_width'    => 'required',
                'room_area'     => 'required',
            ]);
    
            $newData = [
                'portofolio_id' => $id,
                'type'          => $request->type,
                'style'         => $request->style,
                'room_length'   => $request->room_length,
                'room_width'    => $request->room_width,
                'room_area'     => $request->room_area,
            ];

            PortofolioInterior::create($newData);
        }

        return redirect()->route('admin.portofolio.index')->with(['success' => 'Data berhasil dibuat']);
    }

    public function edit($id)
    {
        $portofolio = Portofolio::find($id);
        if ($portofolio->portofolio_category_id == 1) {
            $spesifikasi = PortofolioBuilding::find($portofolio->specificationBuilding->id);
        } else {
            $spesifikasi = PortofolioInterior::find($portofolio->specificationInterior->id);
        }

        return view('admin.portofolio.spesifikasi.edit', ['portofolio' => $portofolio, 'spesifikasi' => $spesifikasi]);
    }

    public function update($id, Request $request)
    {
        $portofolio = Portofolio::find($id);
        if ($portofolio->portofolio_category_id == 1) {
            $request->validate([
                'land_length'       => 'required',
                'land_width'        => 'required',
                'building_length'   => 'required',
                'building_width'    => 'required',
                'floor'             => 'required',
                'bedroom'           => 'required',
                'bathroom'          => 'required',
                'page_area'         => 'required',
                'building_area'     => 'required',
            ]);
    
            $dataUpdate = [
                'land_length'       => $request->land_length,
                'land_width'        => $request->land_width,
                'building_length'   => $request->building_length,
                'building_width'    => $request->building_width,
                'floor'             => $request->floor,
                'bedroom'           => $request->bedroom,
                'bathroom'          => $request->bathroom,
                'page_area'         => $request->page_area,
                'building_area'     => $request->building_area,
            ];

            PortofolioBuilding::where('id', $portofolio->specificationBuilding->id)->update($dataUpdate);
        } else {
            $request->validate([
                'type'          => 'required',
                'style'         => 'required',
                'room_length'   => 'required',
                'room_width'    => 'required',
                'room_area'     => 'required',
            ]);
    
            $dataUpdate = [
                'type'          => $request->type,
                'style'         => $request->style,
                'room_length'   => $request->room_length,
                'room_width'    => $request->room_width,
                'room_area'     => $request->room_area,
            ];

            PortofolioInterior::where('id', $portofolio->specificationInterior->id)->update($dataUpdate);
        }

        return redirect()->route('admin.portofolio.detail', $id)->with(['success' => 'Data berhasil diubah']);
    }
}
