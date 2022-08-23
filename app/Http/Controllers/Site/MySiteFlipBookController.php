<?php

namespace App\Http\Controllers\Site;

use App\Brand;
use App\FlipBook;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MySiteFlipBookController extends Controller
{
    public function index($brand,$design){
        $brand = Brand::where(['slug'=>$brand,'brand_design_id' => $design ])->first();
        if(!$brand){
            return abort(404);
        }
        $flipbook = FlipBook::with('flipbook_slider')->where('brand_id',$brand->id)->first();

        return view('site/flipbook',['flipbook' => $flipbook]);
    }
}
