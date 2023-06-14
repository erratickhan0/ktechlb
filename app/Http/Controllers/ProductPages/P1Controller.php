<?php

namespace App\Http\Controllers\ProductPages;

use App\Http\Controllers\Controller;
use App\ProductDetailsP1;
use Illuminate\Http\Request;

class P1Controller extends Controller
{
    protected $p1 = null;
    public function __construct(Request $request)
    {
        $this->p1 = ProductDetailsP1::first();
            if(!$this->p1){
                return abort(404);
            }

    }
    public function index(){
        $this->p1->load('slide_changer','slide_changer2');
        return view('site/p1',['p1' => $this->p1]);
    }

}
