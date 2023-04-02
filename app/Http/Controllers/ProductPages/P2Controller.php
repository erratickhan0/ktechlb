<?php

namespace App\Http\Controllers\ProductPages;

use App\Http\Controllers\Controller;
use App\P2;
use App\ProductDetailsP1;
use Illuminate\Http\Request;

class P2Controller extends Controller
{
    protected $p2 = null;
    public function __construct(Request $request)
    {
        if(!isset($request['p2'])){
            return abort(404);

        }
        if(isset($request['p2'])){
            $this->p2 = P2::find($request['p2']);
            if(!$this->p2){
                return abort(404);
            }
        }
    }
    public function index($p1){
        $this->p2->load('slide_changer_1','slide_changer_2','slide_changer_3');
        return view('site/p2',['p2' => $this->p2]);
    }

}
