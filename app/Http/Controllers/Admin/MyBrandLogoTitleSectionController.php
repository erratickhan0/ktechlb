<?php

namespace App\Http\Controllers\Admin;

use App\BoxIconSection;
use App\Brand;
use App\Http\Controllers\Controller;
use App\LogoTitleSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MyBrandLogoTitleSectionController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $my_brand = $request->session()->get('selected_brand', 'default');
        $brand = Brand::with('logo_title_section')->where('slug',$my_brand->slug)->first();

        return view('admin.LogoTitle_home.form',['logo_title' => $brand->logo_title_section, 'slug' => $brand->slug ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('admin/LogoTitle_home.form');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->hasFile('logo')) {
            return Redirect::back()->withErrors([
                'msg' => 'Image file is not attached'
            ]);
        }

        $validator = Validator::make($request->all(),[
            'title1'=> 'required',
            'title2'=> 'required',
            'description'=> 'required',
            'logo' => 'required|mimes:jpg,jpeg,png,gif',
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        $brand = $request->session()->get('selected_brand', 'default');

        $logo_title = new LogoTitleSection();
        $request->merge(['brand_id' => $brand->id]);
        $logo_title->fill($request->input());
        $logo_title->save();
        $logo_title->logo = Storage::disk('public')->putFile('logotitle_section', $request->file('logo'));
        $logo_title->save();

        return redirect()
            ->route('admin.mybrand.logo-title',['slug' => $brand->slug])
            ->with('success', 'New icon has been created');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(LogoTitleSection $logo_title,Request $request)
    {

        if($request->hasFile('logo')) {
            $logo_title->logo = Storage::disk('public')->putFile('logotitle_section', $request->file('logo'));
        }
        $logo_title->fill($request->input());
        $logo_title->save();
        $logo_title = $request->session()->get('selected_brand', 'default');
        return redirect()
            ->route('admin.mybrand.logo-title',['slug' => $logo_title->slug])
            ->with('success', 'Logo Title are updated successfully!');
    }


}
