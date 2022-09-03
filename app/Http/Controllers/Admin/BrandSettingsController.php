<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\BrandSettings;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandSettingsController extends Controller
{

    public function store(Request $request,Brand $brand){

    $brand->load('brand_settings');
        $request->merge(['brand_design_id' => $brand->brand_design_id, 'brand_id' => $brand->id ]);
        if($brand->brand_settings()->exists()){

            $brand->brand_settings()->update($request->only( 'home_nav_header',
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
                'article_section_m2'));

            return response()->json([
                "status" => "OK",
                "message" => "Settings are updated!",
            ]);
        }

      $brand_settings = new BrandSettings;
      $brand_settings->fill($request->all());
      $brand_settings->save();

        return response()->json([
            "status" => "OK",
            "message" => "Settings are saved!",
        ]);
    }
}
