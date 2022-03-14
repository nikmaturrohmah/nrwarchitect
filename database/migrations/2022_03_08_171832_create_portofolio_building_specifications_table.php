<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortofolioBuildingSpecificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portofolio_building_specifications', function (Blueprint $table) {
            $table->increments('id');
            $table->UnsignedInteger('portofolio_id');
            $table->float('land_length', '16', '2');
            $table->float('land_width', '16', '2');
            $table->float('building_length', '16', '2');
            $table->float('building_width', '16', '2');
            $table->tinyInteger('floor');
            $table->tinyInteger('bedroom');
            $table->tinyInteger('bathroom');
            $table->timestamps();
            $table->foreign('portofolio_id')->references('id')->on('portofolios')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('portofolio_building_specifications');
    }
}
