<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MySiteController extends Controller
{
    public function index($brand,$design){
        
        return view('site/site');
    }
}
