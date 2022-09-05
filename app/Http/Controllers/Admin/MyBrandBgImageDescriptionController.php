<?php

namespace App\Http\Controllers\Admin;

use App\BrandDesign;
use App\Http\Controllers\Controller;
use App\BgDescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MyBrandBgImageDescriptionController extends Controller
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
        $BgDescription = BgDescription::where('brand_id',$my_brand->id)->where('design_id', $this->my_design->id)->first();
        return view('admin.BgDescription_home.form',['bg_description' => $BgDescription, 'slug' => $my_brand->slug, 'design' => $this->my_design->slug ]);
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
            'description' => 'required',
            'bg_image' => 'required|mimes:jpg,jpeg,png,gif',
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        $brand = $request->session()->get('selected_brand', 'default');

        $BgDescription = new BgDescription();
        $request->merge(['brand_id' => $brand->id,'design_id' => $this->my_design->id]);
        $BgDescription->fill($request->input());
        if ($request->hasFile('bg_image')) {
            $BgDescription->bg_image = Storage::disk('public')->putFile('bg_description', $request->file('bg_image'));
        }
        $BgDescription->save();
        return redirect()
            ->route('admin.mybrand.bg-description',['slug' => $brand->slug,'design' => $this->my_design->slug])
            ->with('success', 'Record is saved');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(BgDescription $BgDescription,Request $request)
    {
        $BgDescription->fill($request->input());
        if ($request->hasFile('bg_image')) {
            $BgDescription->bg_image = Storage::disk('public')->putFile('bg_description', $request->file('bg_image'));
        }
        $BgDescription->save();
        $brand = $request->session()->get('selected_brand', 'default');
        return redirect()
            ->route('admin.mybrand.bg-description',['slug' => $brand->slug,'design' => $this->my_design->slug])
            ->with('success', 'BgDescription_home are updated successfully!');
    }

}
