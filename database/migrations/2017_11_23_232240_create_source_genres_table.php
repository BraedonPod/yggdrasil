<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSourceGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('source_genres', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('genre_id')->unsigned()->index();
            $table->integer('source_genre_id')->unsigned()->index();
            $table->string('source_genre_type')->default('Movie');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('source_genres');
    }
}
