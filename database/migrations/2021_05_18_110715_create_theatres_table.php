<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTheatresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theatres', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger6("mid");
            // $table->foreign('mid')->references('id')->on('movies');
             $table->string("name");
            $table->time("starttime");
            $table->time("endtime");
            $table->integer("price");
            $table->integer("seatsAvailable");
            $table->integer("seats");
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
        Schema::dropIfExists('theatres');
    }
}
