<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
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
        $newData = [
            'title' => $request->post('title'),
            'slug_title'    => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->post('title')), '-')),
            'sub_title' => $request->post('sub_title'),
            'topic' => $request->post('topic'),
            'author'    => $request->post('author'),
            'paragraph'    => $request->post('paragraph'),
            'description'    => $request->post('description'),
            'posted'    => true,
        ];

        $imageName = "article-".rand(1000, 9999).time().'.'.$request->file->extension();
        $webp = Webp::make($request->file);

        if ($webp->save(public_path('images/'.$imageName))) {
            $newData = array_merge($newData, ['cover_image' => $imageName]);
            $article = Article::create($newData);
            $tags = json_decode($request->tags);

            foreach ($tags as $key => $value) {
                $tag = [
                    'article_id'    => $article->id,
                    'tag'           => $value->value,
                ];
        
                ArticleTags::create($tag);
            }
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
        $dataUpdate = [
            'title' => $request->post('title'),
            'slug_title'    => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->post('title')), '-')),
            'sub_title' => $request->post('sub_title'),
            'topic' => $request->post('topic'),
            'author'    => $request->post('author'),
            'paragraph'    => $request->post('paragraph'),
            'description'    => $request->post('description'),
        ];

        $old = Article::find($id);

        if ($request->hasFile('file')) {

            $imagePath = public_path('images/').$old->cover_image;
            if(File::exists($imagePath)) {
                File::delete($imagePath);
            }

            $imageName = "article-".rand(1000, 9999).time().'.'.$request->file->extension();
            $webp = Webp::make($request->file);

            if ($webp->save(public_path('images/'.$imageName))) {
                $dataUpdate = array_merge($dataUpdate, ['cover_image' => $imageName]);
            }
        }

        Article::where('id', $id)->update($dataUpdate);
        return redirect()->route('admin.article.index')->with(['success' => 'Data berhasil diubah']);
    }

    public function detail($id)
    {
        $article = Article::with(['tags'])->find($id);
        return view('admin.article.detail', ['article' => $article]);
    }

    public function delete($id)
    {
        $article = Article::find($id);
        $article->delete();
        
        return redirect()->route('admin.article.index')->with(['success' => 'Data berhasil dihapus']);
    }

    public function publish($id, Request $request)
    {
        $dataUpdate = [
            'posted'  => true,
        ];

        Article::where('id', $id)->update($dataUpdate);
        return redirect()->route('admin.article.index')->with(['success' => 'Data berhasil di draft']);

    }

    public function draft($id, Request $request)
    {
        $dataUpdate = [
            'posted'  => false,
        ];

        Article::where('id', $id)->update($dataUpdate);
        return redirect()->route('admin.article.index')->with(['success' => 'Data berhasil di post']);
    }
}
