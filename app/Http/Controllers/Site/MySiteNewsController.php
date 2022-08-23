<?php

namespace App\Http\Controllers\Site;

use App\Brand;
use App\FlipBook;
use App\Http\Controllers\Controller;
use App\NewsSection;
use Illuminate\Http\Request;

class MySiteNewsController extends Controller
{
    public function index($brand,$design,$id){
        $brands = Brand::where(['slug'=>$brand,'brand_design_id' => $design ])->first();
        if(!$brands){
            return abort(404);
        }
        $news = NewsSection::with('news_details')->where(['brand_id' => $brands->id,'id' => $id])->first();
        if(!$news){
        return    redirect()->route('mysite.index', ['brand' => $brand,'design' => $design ]);
        }

        return view('site/news',['news' => $news]);
    }
}
