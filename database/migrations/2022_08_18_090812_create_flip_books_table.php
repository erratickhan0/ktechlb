<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlipBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flip_books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id');
            $table->foreignId('design_id')->nullable();
            $table->string('section_selector')->nullable();
            $table->string('section2_heading')->nullable();
            $table->string('section2_title')->nullable();
            $table->text('section2_description')->nullable();

            $table->string('section3_heading')->nullable();
            $table->string('section3_title')->nullable();
            $table->text('section3_description')->nullable();
            $table->string('section3_image')->nullable();
            $table->string('section3_btn_link')->nullable();


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
        Schema::dropIfExists('flip_books');
    }
}
