<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Article;
use App\Models\ArticleTags;

class ArticleTagsController extends Controller
{
    public function create($id)
    {
        $article = Article::find($id);
        return view('admin.article.tags.create', ['article' => $article]);
    }

    public function store($id, Request $request)
    {
        $tags = json_decode($request->tag);

        foreach ($tags as $key => $value) {
            $tag = [
                'article_id' => $id,
                'tag'           => $value->value,
            ];
    
            ArticleTags::create($tag);
        }

        return redirect()->route('admin.article.detail', $id)->with(['success' => 'Data berhasil dibuat']);
    }

    public function edit($tagId)
    {
        $tags = ArticleTags::find($tagId);
        $article = Article::where('id', $tags->article_id )->first();
        return view('admin.article.tags.edit', ['article'=> $article, 'tags' => $tags]);
    }

    public function update($tagId, Request $request)
    {
        $request->validate([
            'tags'  => 'required',
        ]);

        $dataUpdate = [
            'tag'   => $request->tag,
        ];

        ArticleTags::where('id', $tagId)->update($dataUpdate);
        $tag = ArticleTags::find($tagId);
        return redirect()->route('admin.article.detail', $tag->article_id)->with(['success' => 'Data berhasil diubah']);
    }

    public function delete($tagId)
    {
        $tags = ArticleTags::find($tagId);
        $tags->delete();
        
        return redirect()->route('admin.article.detail', $tags->article_id)->with(['success' => 'Data berhasil dihapus']);
    }
}

