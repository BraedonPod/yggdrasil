<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSourceDirectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('source_directors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('director_id')->unsigned()->index();
            $table->integer('source_director_id')->unsigned()->index();
            $table->string('source_director_type')->default('Movie');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('source_directors');
    }
}
