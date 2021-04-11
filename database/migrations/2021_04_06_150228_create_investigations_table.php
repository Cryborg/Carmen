<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestigationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investigations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id');

            $table->foreignId('suspect_id');
            $table->json('loc_previous')->nullable()
                ->comment('Already visited locations.');
            $table->string('loc_current')
                ->comment('Current location the player is in.');
            $table->string('loc_next')
                ->comment('Next location the player has to go to.');

            // Warrant data
            $table->string('name')->nullable();
            $table->string('genre')->nullable();
            $table->string('hair')->nullable();
            $table->string('height')->nullable();
            $table->string('origin')->nullable();
            $table->string('hobby')->nullable();
            $table->string('sign')->nullable();
            $table->string('fashion_style')->nullable();

            $table->timestamps();
            $table->softDeletes('case_closed_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('investigations');
    }
}
