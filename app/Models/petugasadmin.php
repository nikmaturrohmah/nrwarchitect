<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class petugasadmin extends Model
{
    protected $table = "users";
    protected $primaryKey = "id";
    // public function pegawai(){
    //     return $this->hasMany(pegawai::class, 'id_pegawai');
    // }
	use SoftDeletes;
    protected $timestamp= false;
    protected $dates= ['deleted_at'];
}
