<?php

namespace App\Http\Controllers\Admin;

use App\BrandDesign;
use App\Http\Controllers\Controller;
use App\Section6;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MyBrandSection6Controller extends Controller
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
        $Section6 = Section6::where('brand_id',$my_brand->id)->where('design_id', $this->my_design->id)->first();
        return view('admin.Section6_home.form',['section6' => $Section6, 'slug' => $my_brand->slug, 'design' => $this->my_design->slug ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'heading'=> 'required',
            'description'=> 'required',
         ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        $brand = $request->session()->get('selected_brand', 'default');

        $Section6 = new Section6();
        $request->merge(['brand_id' => $brand->id,'design_id' => $this->my_design->id]);
        $Section6->fill($request->input());
        $Section6->save();
        return redirect()
            ->route('admin.mybrand.section6',['slug' => $brand->slug,'design' => $this->my_design->slug])
            ->with('success', 'Record is saved');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Section6 $Section6,Request $request)
    {
        $Section6->fill($request->input());
        $Section6->save();
        $brand = $request->session()->get('selected_brand', 'default');
        return redirect()
            ->route('admin.mybrand.section6',['slug' => $brand->slug,'design' => $this->my_design->slug])
            ->with('success', 'Section6 are updated successfully!');
    }

}
