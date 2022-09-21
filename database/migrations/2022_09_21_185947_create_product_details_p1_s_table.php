<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailsP1STable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details_p1_s', function (Blueprint $table) {
            $table->id();
            $table->string('heading')->nullable();
            $table->string('title')->nullable();
            $table->string('video_link')->nullable();
            $table->string('image')->nullable();
            $table->string('page_font')->nullable();
            $table->string('section2_heading')->nullable();
            $table->string('section2_title')->nullable();
            $table->string('section2_video_link')->nullable();
            $table->string('section2_image')->nullable();
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
        Schema::dropIfExists('product_details_p1_s');
    }
}
