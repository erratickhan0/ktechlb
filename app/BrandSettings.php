<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrandSettings extends Model
{
    protected $table = 'brand_settings';
    protected $casts = [
        'home_nav_header' => 'boolean',
        'about_nav_header'  => 'boolean',
        'product_nav_header'  => 'boolean',
        'news_nav_header'  => 'boolean',
        'contact_nav_header'  => 'boolean',
        'dealer_locator_nav_header'  => 'boolean',
        'store_nav_header'  => 'boolean',
        'support_nav_header'  => 'boolean',
        'login_nav_header'  => 'boolean',
        'banner_slider_section'  => 'boolean',
        'icon_section'  => 'boolean',
        'product_section'  => 'boolean',
        'logo_description_section'  => 'boolean',
        'fullwidth_image_section1'  => 'boolean',
        'logo_icon_and_description_with_boxes_section'  => 'boolean',
        'title_description_with_accordian_section'  => 'boolean',
        'fullwidth_video_section'  => 'boolean',
        'fullwidth_image_section2'  => 'boolean',
        'news_blogs_section'  => 'boolean',
        'fullwidth_image_section3'  => 'boolean',
        'slider_section_m2'  => 'boolean',
        'section2_m2'  => 'boolean',
        'product_section_m2'  => 'boolean',
        'fullwidth_video_section_m2'  => 'boolean',
        'section5_m2'  => 'boolean',
        'section6_m2'  => 'boolean',
        'accordian_section_m2'  => 'boolean',
        'fullwidth_image_section1_m2'  => 'boolean',
        'fullwidth_image_section2_m2'  => 'boolean',
        'fullwidth_image_section3_m2'  => 'boolean',
        'news_blogs_section_m2'  => 'boolean',
        'article_section_m2'  => 'boolean',

        'slider_section_m3'  => 'boolean',
        'section2_m3' => 'boolean',
        'product_section_m3'  => 'boolean',
        'bg_description_m3'  => 'boolean',
        'slider2_m3'  => 'boolean',
        'product_description_m3'  => 'boolean',
        'fullwidth_video_section_m3'  => 'boolean',
        'accordian_section_m3'  => 'boolean',
        'fullwidth_image_section1_m3'  => 'boolean',
        'fullwidth_image_section2_m3'  => 'boolean',
        'fullwidth_image_section3_m3'  => 'boolean',
        'section9_m3'  => 'boolean',
        'news_blogs_section_m3'  => 'boolean',
        'article_section_m3'  => 'boolean',
    ];
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
                'brand_id',

                'slider_section_m2',
                'section2_m2',
                'product_section_m2',
                'fullwidth_video_section_m2',
                'section5_m2',
                'section6_m2',
                'accordian_section_m2',
                'fullwidth_image_section1_m2',
                'fullwidth_image_section2_m2',
                'fullwidth_image_section3_m2',
                'news_blogs_section_m2',
                'article_section_m2',

                'slider_section_m3',
                'section2_m3',
                'product_section_m3',
                'bg_description_m3',
                'slider2_m3',
                'product_description_m3',
                'fullwidth_video_section_m3',
                'accordian_section_m3',
                'fullwidth_image_section1_m3',
                'fullwidth_image_section2_m3',
                'fullwidth_image_section3_m3',
                'section9_m3',
                'news_blogs_section_m3',
                'article_section_m3',
    ];
}
