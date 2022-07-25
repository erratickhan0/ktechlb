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
            $table->boolean('home_nav_header')->default(0);
            $table->boolean('about_nav_header')->default(0);
            $table->boolean('product_nav_header')->default(0);
            $table->boolean('news_nav_header')->default(0);
            $table->boolean('contact_nav_header')->default(0);
            $table->boolean('dealer_locator_nav_header')->default(0);
            $table->boolean('store_nav_header')->default(0);
            $table->boolean('support_nav_header')->default(0);
            $table->boolean('login_nav_header')->default(0);
            $table->boolean('banner_slider_section')->default(0);
            $table->boolean('icon_section')->default(0);
            $table->boolean('product_section')->default(0);
            $table->boolean('logo_description_section')->default(0);
            $table->boolean('fullwidth_image_section1')->default(0);
            $table->boolean('fullwidth_image_section')->default(0);
            $table->boolean('logo_icon_and_description_with_boxes_section')->default(0);
            $table->boolean('title_description_with_accordian_section')->default(0);
            $table->boolean('fullwidth_video_section')->default(0);
            $table->boolean('fullwidth_image_section2')->default(0);
            $table->boolean('news_blogs_section')->default(0);
            $table->boolean('fullwidth_image_section3')->default(0);
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
