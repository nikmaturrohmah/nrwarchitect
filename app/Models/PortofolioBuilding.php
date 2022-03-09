<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortofolioBuilding extends Model
{
    use HasFactory;

    protected $table = 'portofolio_building_specifications';

    protected $fillable = [
        'portofolio_id',
        'land_length',
        'land_width',
        'building_length',
        'building_width',
        'floor',
        'bedroom',
        'bathroom',
    ];
}
