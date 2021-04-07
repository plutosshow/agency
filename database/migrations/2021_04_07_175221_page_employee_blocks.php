<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PageEmployeeBlocks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        TODO
        Schema::create('page_employee_blocks', function (Blueprint $table) {
            $table->id();
            $table->string('post');
            $table->string('desc')->nullable();
            $table->timestamps();
        });

        Schema::create('emloyee', function (Blueprint $table) {
            $table->id();
            $table->string('post');
            $table->string('desc')->nullable();
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
        //
    }
}
