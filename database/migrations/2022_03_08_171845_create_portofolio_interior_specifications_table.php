<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortofolioInteriorSpecificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portofolio_interior_specifications', function (Blueprint $table) {
            $table->increments('id');
            $table->UnsignedInteger('portofolio_id');
            $table->string('type');
            $table->string('style');
            $table->float('room_length', '16', '2');
            $table->float('room_width', '16', '2');
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
        Schema::dropIfExists('portofolio_interior_specifications');
    }
}
