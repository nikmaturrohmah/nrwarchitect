<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Portofolio;
use App\Models\PortofolioCategory;
use App\Models\PortofolioImage;
use App\Models\PortofolioTags;

class PortofolioTagsController extends Controller
{
    public function create($id)
    {
        $portofolio = Portofolio::find($id);
        return view('admin.portofolio.tags.create', ['portofolio' => $portofolio]);
    }

    public function store($id, Request $request)
    {
        $request->validate([
            'tags'                      => 'required',
        ]);

        $newData = [
            'portofolio_id'            => $id,
            'tags'                      => $request->tags,
        ];

        PortofolioTags::create($newData);

        return redirect()->route('admin.portofolio.detail', $id)->with(['success' => 'Data berhasil dibuat']);
    }

    public function edit($tagId)
    {
        $tags = PortofolioTags::find($tagId);
        $portofolio = Portofolio::where('id', $tags->portofolio_id )->first();
        return view('admin.portofolio.tags.edit', ['portofolio'=> $portofolio, 'tags' => $tags]);
    }

    public function update($tagId, Request $request)
    {
        $request->validate([
            'tags'                      => 'required',
        ]);

        $dataUpdate = [
            'portofolio_id'            => $id,
            'tags'                      => $request->tag,
        ];

        PortofolioTags::where('id', $tagId)->update($dataUpdate);
        return redirect()->route('admin.portofolio.detail', $tagId)->with(['success' => 'Data berhasil diubah']);
    }

    public function delete($tagId)
    {
        $tags = PortofolioTags::find($tagId);
        $tags->delete();
        
        return redirect()->route('admin.portofolio.detail', $tags->portofolio_id)->with(['success' => 'Data berhasil dihapus']);
    }
}
