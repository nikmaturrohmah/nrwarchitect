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
            $table->id();
            $table->unsignedBigInteger('portofolio_id');
            $table->decimal('land_length', '16', '2');
            $table->decimal('land_width', '16', '2');
            $table->decimal('building_length', '16', '2');
            $table->decimal('building_width', '16', '2');
            $table->integer('floor');
            $table->integer('bedroom');
            $table->integer('bathroom');
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
