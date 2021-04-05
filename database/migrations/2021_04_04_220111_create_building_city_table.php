<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingCityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building_city', function (Blueprint $table) {
            $table->id();

            $table->foreignId('building_id');

            $table->string('city_id', 10)
                ->comment('The city the building is in. = wikidataid in the cities package.');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('building_city');
    }
}
