<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleTags extends Model
{
    use HasFactory;

    protected $table = 'article_tags';
    
    protected $fillable = [
        'article_id',
        'tag',
    ];
}
