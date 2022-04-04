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
        $tags = json_decode($request->tag);

        foreach ($tags as $key => $value) {
            $tag = [
                'portofolio_id' => $id,
                'tag'           => $value->value,
            ];
    
            PortofolioTags::create($tag);
        }

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
            'tags'  => 'required',
        ]);

        $dataUpdate = [
            'tag'   => $request->tag,
        ];

        PortofolioTags::where('id', $tagId)->update($dataUpdate);
        $tag = PortofolioTags::find($tagId);
        return redirect()->route('admin.portofolio.detail', $tag->portofolio_id)->with(['success' => 'Data berhasil diubah']);
    }

    public function delete($tagId)
    {
        $tags = PortofolioTags::find($tagId);
        $tags->delete();
        
        return redirect()->route('admin.portofolio.detail', $tags->portofolio_id)->with(['success' => 'Data berhasil dihapus']);
    }
}
