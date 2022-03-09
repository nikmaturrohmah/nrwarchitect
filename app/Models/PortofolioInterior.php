<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortofolioInterior extends Model
{
    use HasFactory;

    protected $table = 'portofolio_interior_specifications';

    protected $fillable = [
        'portofolio_id',
        'type',
        'style',
        'room_length',
        'room_width',
    ];
}
