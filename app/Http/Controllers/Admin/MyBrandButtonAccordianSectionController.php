<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\BrandDesign;
use App\ButtonAccordianSection;
use App\Http\Controllers\Controller;
use App\LogoTitleSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MyBrandButtonAccordianSectionController extends Controller
{

    protected $my_design = null;
    public function __construct(Request $request)
    {
        $this->my_design = BrandDesign::where('slug',$request->route('design'))->first();
        if(!$this->my_design){
            return abort(404);
        }
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $my_brand = $request->session()->get('selected_brand', 'default');
        $button_accordian = ButtonAccordianSection::where('brand_id',$my_brand->id)->where('design_id',$this->my_design->id)->first();
        return view('admin.ButtonAccordian_home.form',['button_accordian' => $button_accordian , 'slug' => $my_brand->slug,'design' => $this->my_design->slug ]);
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
        $request->merge(['brand_id' => $brand->id,'design_id' => $this->my_design->id]);
        $button_accordian->fill($request->input());
        $button_accordian->save();
        $button_accordian->image = Storage::disk('public')->putFile('buttonaccordian_section', $request->file('image'));
        $button_accordian->save();

        return redirect()
            ->route('admin.mybrand.button-accordian',['slug' => $brand->slug,'design' => $request->route('design')])
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
            ->route('admin.mybrand.button-accordian',['slug' => $button_accordian->slug,'design' => $request->route('design')])
            ->with('success', 'Logo Title are updated successfully!');
    }
}
