<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FlipbookController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $my_brand = $request->session()->get('selected_brand', 'default');
        $brand = Brand::with('flipbook')->where('slug',$my_brand->slug)->first();
        return view('admin.Flipbook.form',['flipbook' => $brand->flipbook, 'slug' => $brand->slug ]);
    }
}
