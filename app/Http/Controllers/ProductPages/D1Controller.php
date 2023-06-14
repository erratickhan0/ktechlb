<?php

namespace App\Http\Controllers\ProductPages;

use App\button2;
use App\Http\Controllers\Controller;
use App\ProductDetailsP1;
use Illuminate\Http\Request;

class D1Controller extends Controller
{
    protected $button2 = null;
    public function __construct(Request $request)
    {
        $this->button2 = button2::first();
        if(!$this->button2){
            return abort(404);
        }

    }
    public function index(){
        $this->button2->load('slide_changer');
        return view('site/d1',['button2' => $this->button2]);
    }

}
