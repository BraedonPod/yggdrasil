<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTvShowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tv_shows', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->longtext('description');
            $table->string('show_length')->nullable();
            $table->integer('max_epsisode')->nullable();
            $table->integer('season')->nullable();
            $table->string('release_date');
            $table->date('release_info');
            $table->string('img_url');
            $table->smallInteger('metascore');
            $table->decimal('user_review', 4, 2)->nullable();
            $table->string('status');
            $table->string('banner_url');
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
        Schema::dropIfExists('tv_shows');
    }
}
