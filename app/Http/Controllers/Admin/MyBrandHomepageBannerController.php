<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\BrandDesign;
use App\HomepageBanners;
use App\Http\Controllers\Controller;
use App\IconSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MyBrandHomepageBannerController extends Controller
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
        $banner = HomepageBanners::where(['brand_id'=>$my_brand->id,'design_id'=> $this->my_design->id])->first();
        return view('admin.Banner_home.form',['banner' => $banner, 'slug' => $my_brand->slug ,'design' => $this->my_design->slug]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand = $request->session()->get('selected_brand', 'default');

        $banners = new HomepageBanners();
        $request->merge(['brand_id' => $brand->id,'design_id' => $this->my_design->id]);
        $banners->fill($request->input());
        $banners->save();
        if($request->hasFile('fullwidth_banner1_fixed')) {
            $banners->fullwidth_banner1_fixed = Storage::disk('public')->putFile('banner_section', $request->file('fullwidth_banner1_fixed'));
        }
        if($request->hasFile('fullwidth_banner2_fixed')) {
            $banners->fullwidth_banner2_fixed = Storage::disk('public')->putFile('banner_section', $request->file('fullwidth_banner2_fixed'));
        }
        if($request->hasFile('fullwidth_banner1_unfixed')) {
            $banners->fullwidth_banner1_unfixed = Storage::disk('public')->putFile('banner_section', $request->file('fullwidth_banner1_unfixed'));
        }
        if($request->hasFile('fullwidth_video')) {
            $banners->fullwidth_video = Storage::disk('public')->putFile('banner_section', $request->file('fullwidth_video'));
        }
        $banners->save();

        return redirect()
            ->route('admin.mybrand.banner',['slug' => $brand->slug,'design' => $this->my_design->slug])
            ->with('success', 'Banners are stored successfully!');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(HomepageBanners $banner,Request $request)
    {
        if($request->hasFile('fullwidth_banner1_fixed')) {
            $banner->fullwidth_banner1_fixed = Storage::disk('public')->putFile('banner_section', $request->file('fullwidth_banner1_fixed'));
        }
        if($request->hasFile('fullwidth_banner2_fixed')) {
            $banner->fullwidth_banner2_fixed = Storage::disk('public')->putFile('banner_section', $request->file('fullwidth_banner2_fixed'));
        }
        if($request->hasFile('fullwidth_banner1_unfixed')) {
            $banner->fullwidth_banner1_unfixed = Storage::disk('public')->putFile('banner_section', $request->file('fullwidth_banner1_unfixed'));
        }
        if($request->hasFile('fullwidth_video')) {
            $banner->fullwidth_video = Storage::disk('public')->putFile('banner_section', $request->file('fullwidth_video'));
        }
        $banner->save();
        $brand = $request->session()->get('selected_brand', 'default');
        return redirect()
            ->route('admin.mybrand.banner',['slug' => $brand->slug,'design' => $this->my_design->slug])
            ->with('success', 'Banners are updated successfully!');
    }

}
