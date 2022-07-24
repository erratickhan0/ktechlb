<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id');
            $table->foreignId('brand_design_id');
            $table->boolean('home_nav_header');
            $table->boolean('about_nav_header');
            $table->boolean('product_nav_header');
            $table->boolean('news_nav_header');
            $table->boolean('contact_nav_header');
            $table->boolean('dealer_locator_nav_header');
            $table->boolean('store_nav_header');
            $table->boolean('support_nav_header');
            $table->boolean('login_nav_header');
            $table->boolean('banner_slider_section');
            $table->boolean('icon_section');
            $table->boolean('product_section');
            $table->boolean('logo_description_section');
            $table->boolean('fullwidth_image_section1');
            $table->boolean('fullwidth_image_section');
            $table->boolean('logo_icon_and_description_with_boxes_section');
            $table->boolean('title_description_with_accordian_section');
            $table->boolean('fullwidth_video_section');
            $table->boolean('fullwidth_image_section2');
            $table->boolean('news_blogs_section');
            $table->boolean('fullwidth_image_section3');
            $table->softDeletes();
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
        Schema::dropIfExists('brand_settings');
    }
}
