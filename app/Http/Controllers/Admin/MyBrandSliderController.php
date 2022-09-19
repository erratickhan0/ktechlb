<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\BrandDesign;
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
        $slider = SliderSection::where(['brand_id' => $my_brand->id,'design_id' => $this->my_design->id])->get();
        return view('admin.Slider_home.listing',['slider' => $slider, 'slug' => $my_brand->slug,'design' => $request->route('design') ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $brand = new Brand();
        return response()->view('admin/Slider_home.form',['design' => $request->route('design')]);
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
           // 'description' => 'required',
            'colour' => 'required',
            'file_path' => $types,
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        $brand = $request->session()->get('selected_brand', 'default');

        $slider = new SliderSection();
        $request->merge(['brand_id' => $brand->id,'design_id' => $this->my_design->id ]);
        $slider->fill($request->input());
        $slider->save();
        $slider->file_path = Storage::disk('public')->putFile('slider_section', $request->file('file_path'));
        $slider->mime_type = $mime_type[0];
        $slider->save();
        $my_brand = $request->session()->get('selected_brand', 'default');
        return redirect()
            ->route('admin.mybrand.slider',['slug' => $my_brand->slug,'design' => $request->route('design')])
            ->with('success', 'New slide has been created');
    }
    public function destroy(Request $request){


        $slider = SliderSection::find($request->input('slider'));
        Storage::disk('public')->delete($slider->file_path);
        $slider->delete();
        $brand = $request->session()->get('selected_brand');
        return redirect()
            ->route('admin.mybrand.slider',['slug'=> $brand->slug ,'design' => $request->route('design')])
            ->with('success', 'Slide has been deleted');
    }
}
