<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MyBrandSliderController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index($slug)
    {

       $brand = Brand::with('slider_section')->where('slug',$slug)->first();

        return view('admin.slider.listing',['slider' => $brand->slider_section, 'slug' => $brand->slug ]);
    }
}
