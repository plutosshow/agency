<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PageDefaultBlocks extends Migration
{
    public function up()
    {
        Schema::create('page_default_blocks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->text('text');
            $table->string('image')->nullable();
            $table->string('page');
            $table->string('color')->nullable();
            $table->string('position')->default('left');
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
        Schema::dropIfExists('page_default_blocks');
    }
}
