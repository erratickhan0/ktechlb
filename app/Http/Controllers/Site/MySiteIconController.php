<?php

namespace App\Http\Controllers\Site;

use App\Brand;
use App\FlipBook;
use App\Http\Controllers\Controller;
use App\IconSection;
use App\NewsSection;
use Illuminate\Http\Request;

class MySiteIconController extends Controller
{
    public function index($brand,$design,$id){
        $brands = Brand::where(['slug'=>$brand,'brand_design_id' => $design ])->first();
        if(!$brands){
            return abort(404);
        }
        $icon = IconSection::with('icon_details','icon_detail_slider')->where(['brand_id' => $brands->id,'id' => $id])->first();
        if(!$icon){
        return    redirect()->route('mysite.index', ['brand' => $brand,'design' => $design ]);
        }

        return view('site/icon',['icon' => $icon]);
    }
}
