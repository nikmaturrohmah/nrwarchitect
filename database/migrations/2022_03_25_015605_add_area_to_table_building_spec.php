<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAreaToTableBuildingSpec extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('portofolio_building_specifications', function (Blueprint $table) {
            $table->float('page_area');
            $table->float('building_area');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('portofolio_building_specifications', function (Blueprint $table) {
            $table->dropColumn('page_area');
            $table->dropColumn('building_area');
        });
    }
}
