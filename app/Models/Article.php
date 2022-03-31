<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug_title',
        'slug_judul',
        'sub_judul',
        'penulis',
        'description',
    ];

    public function tags()
    {
        return $this->hasMany(ArticleTags::class, 'article_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(ArticleImage::class, 'article_id', 'id');
    }
}
