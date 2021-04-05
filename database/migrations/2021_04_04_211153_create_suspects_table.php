<?php

use App\Models\Suspect;
use Faker\Provider\Person;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suspects', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->enum('genre', [Person::GENDER_MALE, Person::GENDER_FEMALE]);
            $table->enum('hair', Suspect::HAIR);
            $table->enum('height', Suspect::HEIGHTS);
            $table->enum('origin', array_keys(Suspect::ORIGINS_LIST));
            $table->enum('hobbies', Suspect::HOBBIES);
            $table->enum('signs', Suspect::SIGNS);
            $table->enum('fashion_style', Suspect::FASHION_STYLES);

            $table->unique([
                'genre', 'hair', 'height', 'origin', 'hobbies', 'signs', 'fashion_style'
            ], 'unique_suspect');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suspects');
    }
}
