<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->integer('aid')->unsigned()->nullable();
            $table->integer('t_id')->unsigned()->nullable();
            // $table->unsignedBigInteger("aid");
            // $table->foreign('aid')->references('id')->on('actors');
            $table->string("title");
            $table->string("overview");
            $table->integer("releaseyear");
            $table->time("runtime");
            $table->string("castmembers");
            $table->text("movie_img");
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
        Schema::dropIfExists('movies');
    }
}
