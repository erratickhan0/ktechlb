<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\ButtonAccordianSection;
use App\Http\Controllers\Controller;
use App\LogoTitleSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MyBrandButtonAccordianSectionController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $my_brand = $request->session()->get('selected_brand', 'default');
        $brand = Brand::with('button_accordian_section')->where('slug',$my_brand->slug)->first();

        return view('admin.ButtonAccordian_home.form',['button_accordian' => $brand->button_accordian_section, 'slug' => $brand->slug ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('admin/ButtonAccordian_home.form');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->hasFile('image')) {
            return Redirect::back()->withErrors([
                'msg' => 'Image file is not attached'
            ]);
        }

        $validator = Validator::make($request->all(),[
            'title'=> 'required',
            'description'=> 'required',
            'image' => 'required|mimes:jpg,jpeg,png,gif',
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        $brand = $request->session()->get('selected_brand', 'default');

        $button_accordian = new ButtonAccordianSection();
        $request->merge(['brand_id' => $brand->id]);
        $button_accordian->fill($request->input());
        $button_accordian->save();
        $button_accordian->image = Storage::disk('public')->putFile('buttonaccordian_section', $request->file('image'));
        $button_accordian->save();

        return redirect()
            ->route('admin.mybrand.button-accordian',['slug' => $brand->slug])
            ->with('success', 'New icon has been created');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(ButtonAccordianSection $button_accordian,Request $request)
    {

        if($request->hasFile('image')) {
            $button_accordian->image = Storage::disk('public')->putFile('buttonaccordian_section', $request->file('image'));
        }
        $button_accordian->fill($request->input());
        $button_accordian->save();
        $button_accordian = $request->session()->get('selected_brand', 'default');
        return redirect()
            ->route('admin.mybrand.button-accordian',['slug' => $button_accordian->slug])
            ->with('success', 'Logo Title are updated successfully!');
    }
}
