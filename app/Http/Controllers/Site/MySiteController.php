<?php

namespace App\Http\Controllers\Site;

use App\Brand;
use App\BrandDesign;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MySiteController extends Controller
{
    public function index($brand,$design){
       $brand_design = BrandDesign::find($design);
       if(!$brand_design){
           abort(404);
       }

        if($brand_design->slug == 'm1'){
            $brand = Brand::with(['slider_section' => function($query) use ($design) { $query->where('design_id',$design);}
                ,'banner_section' => function($query) use ($design) { $query->where('design_id',$design);},
                'brand_settings',
                'icon_section',
                'product_section',
                'logo_title_section',
                'boxicon_section',
                'button_accordian_section'=> function($query) use ($design) { $query->where('design_id',$design);},
                'news_section' => function($query) use ($design) { $query->where('design_id',$design);}])
                ->where(['slug'=>$brand,'brand_design_id' => $design ])
                ->first();
            if(!$brand){
                return abort(404);
            }
            return view('site/site',['brand' => $brand]);
        }
        if($brand_design->slug == 'm2'){
            $brand = Brand::with(['slider_section' => function($query) use ($design) { $query->where('design_id',$design);}
            ,'section2' => function($query) use ($design) { $query->where('design_id',$design);}
            ,'product_m2' => function($query) use ($design) { $query->where('design_id',$design);}
            ,'banner_section' => function($query) use ($design) { $query->where('design_id',$design);}
            ,'section5' => function($query) use ($design) { $query->where('design_id',$design);}
            ,'section6' => function($query) use ($design) { $query->where('design_id',$design);}
            ,'button_accordian_section'=> function($query) use ($design) { $query->where('design_id',$design);}
            ,'news_section' => function($query) use ($design) { $query->where('design_id',$design);}
            ,'article_section' => function($query) use ($design) { $query->where('design_id',$design);}
            ])
            ->where(['slug'=>$brand,'brand_design_id' => $design ])
            ->first();
            if(!$brand){
                return abort(404);
            }
            return view('site/site-m2',['brand' => $brand]);
        }

    }
}
