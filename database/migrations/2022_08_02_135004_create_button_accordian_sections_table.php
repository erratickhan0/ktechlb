<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateButtonAccordianSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('button_accordian_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id');
            $table->boolean('show_button')->default(0);
            $table->boolean('show_accordian')->default(0);
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('button_accordian_sections');
    }
}
