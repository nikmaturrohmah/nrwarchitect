<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class testimonial extends Model
{
    protected $table = "testimonials";
    protected $primaryKey = "id";
	use SoftDeletes;
    protected $timestamp= false;
    protected $dates= ['deleted_at'];
}
