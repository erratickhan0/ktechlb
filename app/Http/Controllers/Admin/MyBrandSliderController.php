<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Http\Controllers\Controller;
use App\SliderSection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MyBrandSliderController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $my_brand = $request->session()->get('selected_brand', 'default');
       $brand = Brand::with('slider_section')->where('slug',$my_brand->slug)->first();
        return view('admin.slider.listing',['slider' => $brand->slider_section, 'slug' => $brand->slug ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = new Brand();
        return response()->view('admin/slider.form');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->hasFile('file_path')) {
        return Redirect::back()->withErrors([
                'msg' => 'Image or video file is not attached'
            ]);
        }
        $mime =    $request->file('file_path')->getMimeType();
        $mime_type = $var = preg_split("#/#", $mime);
        $types = '';
        if($mime_type[0] == 'image'){
            $types = 'required|mimes:jpg,jpeg,png,gif';
        }
        if($mime_type[0] == 'video'){
            $types = 'required|mimes:mp4,ogx,oga,ogv,ogg,webm';
        }

        $validator = Validator::make($request->all(),[
            'title'=> 'required',
            'description' => 'required',
            'colour' => 'required',
            'file_path' => $types,
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        $brand = $request->session()->get('selected_brand', 'default');

        $slider = new SliderSection();
        $request->merge(['brand_id' => $brand->id]);
        $slider->fill($request->input());
        $slider->save();
        $slider->file_path = Storage::disk('public')->putFile('slider_section', $request->file('file_path'));
        $slider->save();

        return redirect()
            ->route('admin.mybrand.slider')
            ->with('success', 'New slide has been created');
    }
    public function destroy(Request $request){

        $slider = SliderSection::find($request->input('slider'));
        Storage::disk('public')->delete($slider->file_path);
        $slider->delete();
        $brand = $request->session()->get('selected_brand');
        return redirect()
            ->route('admin.mybrand.slider',['slug'=> $brand->slug ])
            ->with('success', 'Slide has been deleted');
    }
}
