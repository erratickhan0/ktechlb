<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoxIconSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('box_icon_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id');
            $table->foreignId('design_id')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('box_icon')->nullable();
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
        Schema::dropIfExists('box_icon_sections');
    }
}
