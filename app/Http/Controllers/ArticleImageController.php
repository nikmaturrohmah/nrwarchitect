<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Article;
use App\Models\ArticleImage;
use Webp;

use Illuminate\Http\Request;

class ArticleImageController extends Controller
{
    public function create($id)
    {
        $article = Article::find($id);
        return view('admin.article.image.create', ['article' => $article]);
    }

    public function store($id, Request $request)
    {
        foreach ($request->file as $key => $value) {
            $imageName = "article-".rand(1000, 9999).time().'.'.$value->extension();
            $webp = Webp::make($value);

            if ($webp->save(public_path('images/'.$imageName))) {
                $image = [
                    'article_id' => $id,
                    'image'         => $imageName,
                ];
    
                ArticleImage::create($image);
            }
        }

        return redirect()->route('admin.article.detail', $id)->with(['success' => 'Data berhasil dibuat']);
    }

    public function edit($imageId)
    {
        $image = ArticleImage::find($imageId);
        $article = Article::where('id', $image->article_id )->first();
        return view('admin.article.image.edit',  ['article'=> $article,'image' => $image]);
    }

    public function update($imageId, Request $request)
    {
        $dataUpdate = [];
        $old = ArticleImage::find($imageId);

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

        ArticleImage::where('id', $imageId)->update($dataUpdate);
        return redirect()->route('admin.article.detail', $old->article_id)->with(['success' => 'Data berhasil diubah']);
    }

    public function delete($imageId)
    {
        $image = ArticleImage::find($imageId);
        $image->delete();

        $imagePath = public_path('images/').$image->image;
        if(File::exists($imagePath)) {
            File::delete($imagePath);
        }
        
        return redirect()->route('admin.article.detail', $image->article_id)->with(['success' => 'Data berhasil dihapus']);
    }
}

