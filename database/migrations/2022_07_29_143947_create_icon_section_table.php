<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class
CreateIconSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icon_section', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id');
            $table->foreignId('design_id')->nullable();
            $table->string('title')->nullable();
            $table->string('file_path')->nullable();
            $table->string('background_image')->nullable();
            $table->string('details_title')->nullable();
            $table->string('details_subtitle')->nullable();
            $table->string('details_background_image1')->nullable();
            $table->string('details_background_image2')->nullable();
            $table->string('details_heading')->nullable();
            $table->string('details_title_color')->nullable();
            $table->string('details_description')->nullable();
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
        Schema::dropIfExists('icon_section');
    }
}
