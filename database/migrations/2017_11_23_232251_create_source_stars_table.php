<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSourceStarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('source_stars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('star_id')->unsigned()->index();
            $table->integer('source_star_id')->unsigned()->index();
            $table->string('source_star_type')->default('Movie');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('source_stars');
    }
}
