<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_section', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id');
            $table->foreignId('design_id')->nullable();
            $table->string('title')->nullable();
            $table->string('product_logo')->nullable();
            $table->string('product_image')->nullable();
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
        Schema::dropIfExists('product_section');
    }
}
