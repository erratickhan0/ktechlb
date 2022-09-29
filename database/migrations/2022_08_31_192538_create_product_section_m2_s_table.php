<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSectionM2STable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_section_m2_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id');
            $table->foreignId('design_id')->nullable();
            $table->text('left_description')->nullable();
            $table->text('right_description')->nullable();
            $table->string('left_product_image')->nullable();
            $table->string('background_image')->nullable();
            $table->string('right_product_image1')->nullable();
            $table->string('right_product_image2')->nullable();
            $table->string('right_product_image3')->nullable();
            $table->string('right_product_image4')->nullable();
            $table->string('btn_text')->nullable();
            $table->string('btn_link')->nullable();
            $table->boolean('btn_show')->nullable();
            $table->boolean('show_homepage')->nullable();
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
        Schema::dropIfExists('product_section_m2_s');
    }
}
