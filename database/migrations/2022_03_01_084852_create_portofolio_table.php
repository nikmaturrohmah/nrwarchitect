<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortofolioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portofolios', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->float('dimensi_lahan');
            $table->float('luas_lahan');
            $table->float('luas_bangunan');
            $table->float('jumlah_lantai');
            $table->float('kamar_tidur');
            $table->float('kamar_mandi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('portofolios');
    }
}
