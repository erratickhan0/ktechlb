<?php

namespace App\Http\Controllers\ProductPages;

use App\D1SliderSection;
use App\D1SliderSection2;
use App\D1SliderSection3;
use App\Http\Controllers\Controller;
use App\ProductDetailsP1;
use Illuminate\Http\Request;

class P3Controller extends Controller
{
    public function __construct(Request $request)
    {

    }
    public function index(){
        $slider1 = D1SliderSection::all();
        $slider2 = D1SliderSection2::all();
        $slider3 = D1SliderSection3::all();
        return view('site/p3',['slider1' => $slider1,'slider2' => $slider2,'slider3' => $slider3]);
    }

}