<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeliculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peliculas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('year');
            $table->string('country')->nullable();
            $table->string('director');
            $table->text('actor');
            $table->text('sinopsis')->nullable();
            $table->string('image');
            $table->integer('disk_id')->unsigned();
            $table->timestamps();

            $table->foreign('disk_id')->references('id')->on('disks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peliculas');
    }
}
