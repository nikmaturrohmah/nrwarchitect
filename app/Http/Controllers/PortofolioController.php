<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Portofolio;
use App\Models\PortofolioCategory;

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
        $request->validate([
            'portofolio_category_id'    => 'required',
            'name'                      => 'required',
            'description'               => 'required',
        ]);

        $newData = [
            'portofolio_category_id'    => $request->portofolio_category_id,
            'name'                      => $request->name,
            'description'               => $request->description,
        ];

        Portofolio::create($newData);

        return redirect()->route('admin.portofolio.index')->with(['success' => 'Data berhasil dibuat']);
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
        $portofolio = Portofolio::with(['category', 'images'])->find($id);
        $category = PortofolioCategory::get();
        return view('admin.portofolio.detail', ['portofolio' => $portofolio, 'category' => $category,]);
    }

    public function delete($id)
    {
        $portofolio = Portofolio::find($id);
        $portofolio->delete();
        
        return redirect()->route('admin.portofolio.index')->with(['success' => 'Data berhasil dihapus']);
    }
}
