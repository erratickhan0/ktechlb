<?php

namespace App\Http\Controllers\ProductPages;

use App\button2;
use App\Http\Controllers\Controller;
use App\ProductDetailsP1;
use Illuminate\Http\Request;

class Button2Controller extends Controller
{
    protected $button2 = null;
    public function __construct(Request $request)
    {
        if(!isset($request['button2'])){
            return abort(404);

        }
        if(isset($request['button2'])){
            $this->button2 = button2::find($request['button2']);
            if(!$this->button2){
                return abort(404);
            }
        }
    }
    public function index($button2){
        $this->button2->load('slide_changer');
        return view('site/button2',['button2' => $this->button2]);
    }

}
