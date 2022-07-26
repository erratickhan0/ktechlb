<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrandSettings extends Model
{
    protected $table = 'brand_settings';
    protected $fillable = [
                'home_nav_header',
                'about_nav_header',
                'product_nav_header',
                'news_nav_header',
                'contact_nav_header',
                'dealer_locator_nav_header',
                'store_nav_header',
                'support_nav_header',
                'login_nav_header',
                'banner_slider_section',
                'icon_section',
                'product_section',
                'logo_description_section',
                'fullwidth_image_section1',
                'logo_icon_and_description_with_boxes_section',
                'title_description_with_accordian_section',
                'fullwidth_video_section',
                'fullwidth_image_section2',
                'news_blogs_section',
                'fullwidth_image_section3',
                'brand_design_id',
                'brand_id'
    ];
}
