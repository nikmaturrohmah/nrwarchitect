<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'portofolio_category_id',
        'name',
        'description',
    ];

    public function category()
    {
        return $this->hasOne(PortofolioCategory::class, 'id', 'portofolio_category_id');
    }

    public function images()
    {
        return $this->hasMany(PortofolioImage::class, 'portofolio_id', 'id');
    }

    public function specificationBuilding()
    {
        return $this->hasOne(PortofolioBuilding::class, 'portofolio_id', 'id');
    }

    public function specificationInterior()
    {
        return $this->hasOne(PortofolioInterior::class, 'portofolio_id', 'id');
    }

    public function tags()
    {
        return $this->hasMany(PortofolioTags::class, 'portofolio_id', 'id');
    }

    protected $with = ['specificationBuilding', 'specificationInterior'];
}