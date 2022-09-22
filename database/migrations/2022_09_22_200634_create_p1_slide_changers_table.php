<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateP1SlideChangersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p1_slide_changers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('p1_id');
            $table->string('heading')->nullable();
            $table->text('description')->nullable();
            $table->string('left_image')->nullable();
            $table->string('right_image')->nullable();
            $table->string('right_bg_image')->nullable();
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
        Schema::dropIfExists('p1_slide_changers');
    }
}
