<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('isbn_10')->unique();
            $table->string('isbn_13')->unique();
            $table->string('slug')->unique();
            $table->string('series_name')->nullable();
            $table->string('author');
            $table->string('status')->nullable();
            $table->smallInteger('score')->nullable();
            $table->decimal('user_review', 4, 2)->nullable();
            $table->integer('pages')->nullable();
            $table->longtext('description');
            $table->date('published')->nullable();
            $table->string('publishing_company')->nullable();
            $table->string('img_url')->nullable();
            $table->string('banner_url')->nullable();
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
        Schema::dropIfExists('books');
    }
}
