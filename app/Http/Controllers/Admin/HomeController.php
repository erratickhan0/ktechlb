<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Javascript;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('profile.edit');
    }
    public function switchBrands(Request $request){

       if($request->has('brand') && !empty($request['brand'])){
           $brand = Brand::where('slug',$request['brand'])->first();
           $brand->load('brand_design','product_design','detail_design');
           Session::put('selected_brand',$brand);
       }
       else{
           return redirect()->back();
       }
        return redirect()->route('admin.mybrand.settings', ['slug' => $request->input('brand')]);
    }
    public function changeBrand($slug){

        $brand = Brand::where('slug',$slug)->first();
        if(!$brand){
            abort(404);
        }
        $brand->load('brand_settings');
        \JavaScript::put([
                'brand' => $brand,
            ]
        );

        return view('admin/mybrand/selectedbrand',['slug' => $slug]);
    }
}
