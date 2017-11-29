<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibraryEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('library_entries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('source_id')->unsigned()->index();
            $table->enum('source_type', ['Movie','Tv Show', 'Book']);
            $table->enum('status', ['Completed','Watching','Reading','Plan to Watch','Plan to Read','Dropped'])->nullable();
            $table->mediumText('notes')->nullable();
            $table->integer('rating')->nullable();
            $table->dateTime('started_at')->nullable();
            $table->dateTime('finished_at')->nullable();
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
        Schema::dropIfExists('library_entries');
    }
}
