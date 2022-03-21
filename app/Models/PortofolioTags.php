<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortofolioTags extends Model
{
    use HasFactory;
    protected $table = 'portofolio_tags';
    
    protected $fillable = [
        'portofolio_id',
        'tag',
    ];
}
