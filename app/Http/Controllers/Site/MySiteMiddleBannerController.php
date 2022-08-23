<?php

namespace App\Http\Controllers\Site;

use App\Brand;
use App\FlipBook;
use App\Http\Controllers\Controller;
use App\IconSection;
use App\LogoTitleSection;
use Illuminate\Http\Request;

class MySiteMiddleBannerController extends Controller
{
    public function index($brand,$design){
        $brand = Brand::where(['slug'=>$brand,'brand_design_id' => $design ])->first();
        if(!$brand){
            return abort(404);
        }
        $midddle_banner = LogoTitleSection::with('logo_title_details','logo_title_detail_slider')->where('brand_id',$brand->id)->first();

        return view('site/middle_banner',['middle_banner' => $midddle_banner]);
    }
}
