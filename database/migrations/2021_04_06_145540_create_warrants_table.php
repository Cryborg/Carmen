<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarrantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warrants', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id');

            $table->string('name')->nullable();
            $table->string('genre')->nullable();
            $table->string('hair')->nullable();
            $table->string('height')->nullable();
            $table->string('origin')->nullable();
            $table->string('hobby')->nullable();
            $table->string('sign')->nullable();
            $table->string('fashion_style')->nullable();

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
        Schema::dropIfExists('warrants');
    }
}
