<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug_title',
        'sub_title',
        'topic',
        'author',
        'cover_image',
        'posted',
        'description',
    ];

    public function tags()
    {
        return $this->hasMany(ArticleTags::class, 'article_id', 'id');
    }
}
