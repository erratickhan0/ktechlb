<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomepageBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homepage_banners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id');
            $table->foreignId('design_id')->nullable();
            $table->string('fullwidth_banner1_fixed')->nullable();
            $table->string('fullwidth_banner2_fixed')->nullable();
            $table->string('fullwidth_video')->nullable();
            $table->string('fullwidth_banner1_unfixed')->nullable();
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
        Schema::dropIfExists('homepage_banners');
    }
}
