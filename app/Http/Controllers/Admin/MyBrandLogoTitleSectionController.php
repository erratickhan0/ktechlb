<?php

namespace App\Http\Controllers\Admin;

use App\BoxIconSection;
use App\Brand;
use App\Http\Controllers\Controller;
use App\LogoTitleDetail;
use App\LogoTitleDetailSlider;
use App\LogoTitleSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use JavaScript;

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

        JavaScript::put([
                'logo_title_section' => $brand->logo_title_section,
                'detail_section' => $brand->logo_title_section ? $brand->logo_title_section->logo_title_details:'',
                'slider_detail_section' => $brand->logo_title_section ? $brand->logo_title_section->logo_title_detail_slider : ''
            ]
        );

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
    public function updateDetails(LogoTitleSection $logo_title,Request $request)
    {
        $logo_title->fill($request->all());
        if($request->hasFile('details_background_image1')){
            $logo_title->details_background_image1 = Storage::disk('public')->putFile('logotitle_section', $request->file('details_background_image1'));
        }
        if($request->hasFile('details_background_image2')){
            $logo_title->details_background_image2 = Storage::disk('public')->putFile('logotitle_section', $request->file('details_background_image2'));
        }
        $logo_title->save();
        return response()->json([
            "status" => "OK",
            "message" => "Logo Title Details are added successfully!",
        ]);
    }
    public function updateDetailInner(LogoTitleSection $logo_title,Request $request)
    {
        if(!$request->hasFile('image')) {
            return response()->json([
                "status" => "ERROR",
                "message" => "Please upload Image or Video file!",
            ]);
        }

        $details =   $logo_title->logo_title_details()->create($request->all());

        if($request->hasFile('image')){
            $details->image = Storage::disk('public')->putFile('logotitle_section/details', $request->file('image'));
        }
        $mime =    $request->file('image')->getMimeType();
        $mime_type = $var = preg_split("#/#", $mime);
        $details->mime_type = $mime_type[0];
        $details->save();
        return response()->json([
            "status" => "OK",
            "message" => "Details are added successfully!",
        ]);
    }
    public function updateDetailInner2(LogoTitleSection $logo_title,Request $request)
    {
        if(!$request->hasFile('image')) {
            return response()->json([
                "status" => "ERROR",
                "message" => "Please upload Image or Video file!",
            ]);
        }

        $details =   $logo_title->logo_title_detail_slider()->create($request->all());

        if($request->hasFile('image')){
            $details->image = Storage::disk('public')->putFile('logotitle_section/slider', $request->file('image'));
        }
        $mime =    $request->file('image')->getMimeType();
        $mime_type = $var = preg_split("#/#", $mime);
        $details->mime_type = $mime_type[0];
        $details->save();
        return response()->json([
            "status" => "OK",
            "message" => "Details are added successfully!",
        ]);
    }
    public function sectionDelete1(LogoTitleDetail $logo_title_details){

        if($logo_title_details->image){
            Storage::disk('public')->delete($logo_title_details->image);
        }
        $logo_title_details->delete();
        return response()->json([
            "status" => "OK",
            "message" => "One row has been deleted",
        ]);
    }
    public function sectionDelete2(LogoTitleDetailSlider $logo_title_detail_slider){
        if($logo_title_detail_slider->image){
            Storage::disk('public')->delete($logo_title_detail_slider->image);
        }
        $logo_title_detail_slider->delete();
        return response()->json([
            "status" => "OK",
            "message" => "One row has been deleted",
        ]);
    }

}
