<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogoTitleDetailSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logo_title_detail_sliders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('logo_title_section_id');
            $table->string('heading')->nullable();
            $table->string('image')->nullable();
            $table->string('mime_type')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('logo_title_detail_sliders');
    }
}
