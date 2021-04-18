<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pictures', function (Blueprint $table) {
            $table->id();

            $table->morphs('imageable');
            $table->string('filename');
            $table->string('title')->nullable();
            $table->text('description')->nullable();

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
        Schema::dropIfExists('pictures');
    }
}
