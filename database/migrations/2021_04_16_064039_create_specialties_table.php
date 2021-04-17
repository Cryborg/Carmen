<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialtiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialties', function (Blueprint $table) {
            $table->id();

            $table->string('country', 2);

            $table->string('name');
            $table->string('wikipedia_link');
            $table->json('clues');

            $table->foreignId('user_id');

            $table->timestamp('approved_at')->nullable();

            $table->bigInteger('approved_by')->nullable()->unsigned();
            $table->foreign('approved_by')
                ->nullable()
                ->references('id')
                ->on('users');

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
        Schema::dropIfExists('specialties');
    }
}
