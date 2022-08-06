<?php

namespace App\Http\Controllers\Site;

use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MySiteController extends Controller
{
    public function index($brand,$design){
        $brand = Brand::with('banner_section','brand_settings','slider_section','icon_section','product_section','logo_title_section','boxicon_section','button_accordian_section','news_section')->where('slug',$brand)->first();
        return view('site/site',['brand' => $brand]);
    }
}
