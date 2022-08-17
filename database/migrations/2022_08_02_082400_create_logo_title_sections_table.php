<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogoTitleSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logo_title_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id');
            $table->string('title1')->nullable();
            $table->string('title2')->nullable();
            $table->text('description')->nullable();
            $table->string('logo')->nullable();
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
        Schema::dropIfExists('logo_title_sections');
    }
}
