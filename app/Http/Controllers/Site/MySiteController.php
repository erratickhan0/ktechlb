<?php

namespace App\Http\Controllers\Site;

use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MySiteController extends Controller
{
    public function index($brand,$design){

        $brand = Brand::with(['slider_section' => function($query) use ($design) { $query->where('design_id',$design);}
            ,'banner_section',
            'brand_settings',
            'icon_section',
            'product_section',
            'logo_title_section',
            'boxicon_section',
            'button_accordian_section',
            'news_section' => function($query) use ($design) { $query->where('design_id',$design);}])
            ->where(['slug'=>$brand,'brand_design_id' => $design ])
            ->first();
        if(!$brand){
            return abort(404);
        }
        return view('site/site',['brand' => $brand]);
    }
}
