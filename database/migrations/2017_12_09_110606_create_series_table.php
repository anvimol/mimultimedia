<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('year');
            $table->string('temporada');
            $table->string('country')->nullable();
            $table->string('director');
            $table->text('actor');
            $table->text('sinopsis')->nullable();
            $table->boolean('completed')->default(false);
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
        Schema::dropIfExists('series');
    }
}
