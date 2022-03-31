<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Article;
use App\Models\ArticleImage;
use App\Models\ArticleTags;
use Webp;

class ArticleController extends Controller
{
    public function index()
    {
        $article = Article::get();
        return view('admin.article.index', ['article' => $article]);
    }

    public function create()
    {
        return view('admin.article.create');
    }

    public function store(Request $request)
    {
        //return response()->json($request->description);

        $article = [
            'slug_title'      => $request->slug_title,
            'slug_judul'      => $request->slug_judul,
            'sub_judul'       => $request->sub_judul,
            'penulis'         => $request->penulis,
            'description'     => $request->description,
        ];

        $article = Article::create($article);

        foreach ($request->file as $key => $value) {
            $imageName = "article-".rand(1000, 9999).time().'.'.$value->extension();

            $webp = Webp::make($value);

            if ($webp->save(public_path('images/'.$imageName))) {
                $image = [
                    'article_id' => $article->id,
                    'image'         => $imageName,
                ];
    
                ArticleImage::create($image);
            }
        }

        $tags = json_decode($request->tags);

        foreach ($tags as $key => $value) {
            $tag = [
                'article_id' => $article->id,
                'tag'           => $value->value,
            ];
    
            ArticleTags::create($tag);
        }

        return redirect()->route('admin.article.index')->with(['success' => 'Data berhasil diubah']);
    }

    public function edit($id)
    {
        $article = Article::find($id);
        return view('admin.article.edit', ['article' => $article]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'slug_title'       => 'required',
            'slug_judul'       => 'required',
            'sub_judul'        => 'required',
            'penulis'          => 'required',
            'description'      => 'required',
        ]);

        $dataUpdate = [
            'slug_title'    => $request->slug_title,
            'slug_judul'    => $request->slug_judul,
            'sub_judul'     => $request->sub_judul,
            'penulis'       => $request->penulis,
            'description'   => $request->description,
        ];

        Article::where('id', $id)->update($dataUpdate);
        return redirect()->route('admin.article.index')->with(['success' => 'Data berhasil diubah']);
    }

    public function detail($id)
    {
        $article = Article::with(['images', 'tags'])->find($id);
        // return response()->json($article);
        return view('admin.article.detail', ['article' => $article]);
    }

    public function delete($id)
    {
        $article = Article::find($id);
        $article->delete();
        
        return redirect()->route('admin.article.index')->with(['success' => 'Data berhasil dihapus']);
    }
}
