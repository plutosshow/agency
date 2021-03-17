<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Flats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flats', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('rooms');
            $table->unsignedTinyInteger('floor');
            $table->unsignedBigInteger('price');
            $table->unsignedFloat('livedSquare');
            $table->unsignedFloat('commonSquare');
            $table->year('year');
            $table->string('owner');
            $table->string('type');
            $table->text('comments');
            $table->string('region');
            $table->string('district');
            $table->string('city');
            $table->string('street');
            $table->string('building');
            $table->string('zip');
            $table->boolean('relevant');
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
        Schema::dropIfExists('flats');
    }
}
