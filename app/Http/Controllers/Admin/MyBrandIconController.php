<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Http\Controllers\Controller;
use App\IconDetail;
use App\IconSection;
use App\SliderSection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use JavaScript;

class MyBrandIconController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $my_brand = $request->session()->get('selected_brand', 'default');
        $brand = Brand::with('icon_section')->where('slug',$my_brand->slug)->first();

        return view('admin.Icon_home.listing',['icon' => $brand->icon_section, 'slug' => $brand->slug ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = new Brand();
        return response()->view('admin/Icon_home.form');
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
                'msg' => 'Image file is not attached'
            ]);
        }

        $validator = Validator::make($request->all(),[
            'title'=> 'required',
            'file_path' => 'required|mimes:jpg,jpeg,png,gif',
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        $brand = $request->session()->get('selected_brand', 'default');

        $icon = new IconSection();
        $request->merge(['brand_id' => $brand->id]);
        $icon->fill($request->input());
        $icon->save();
        $icon->file_path = Storage::disk('public')->putFile('icon_section', $request->file('file_path'));
        if($request->hasFile('background_image')) {
            $icon->background_image = Storage::disk('public')->putFile('icon_section/icon_background', $request->file('background_image'));
        }
        $icon->save();
        $my_brand = $request->session()->get('selected_brand', 'default');
        return redirect()
            ->route('admin.mybrand.icon',['slug' => $my_brand->slug])
            ->with('success', 'New icon has been created');
    }
    public function destroy(Request $request){
        $icon = IconSection::find($request->input('icon'));
        if($icon->file_path){
            Storage::disk('public')->delete($icon->file_path);
        }
        if($icon->background_image){
            Storage::disk('public')->delete($icon->background_image);
        }

        $icon->delete();
        $brand = $request->session()->get('selected_brand');
        return redirect()
            ->route('admin.mybrand.icon',['slug'=> $brand->slug ])
            ->with('success', 'Icon has been deleted');
    }
    public function details(IconSection $icon){
        JavaScript::put([
                'icon' => $icon,
                'detail_section' => $icon->icon_details
            ]
        );
        return response()->view('admin/Icon_home.details');
    }
    public function update(IconSection $icon,Request $request){
        $icon->fill($request->all());
        if($request->hasFile('file_path')){
            $icon->file_path = Storage::disk('public')->putFile('icon_section', $request->file('file_path'));
        }
        if($request->hasFile('details_background_image1')){
            $icon->details_background_image1 = Storage::disk('public')->putFile('icon_section', $request->file('details_background_image1'));
        }
        if($request->hasFile('details_background_image2')){
            $icon->details_background_image2 = Storage::disk('public')->putFile('icon_section', $request->file('details_background_image2'));
        }
        $icon->save();
        return response()->json([
            "status" => "OK",
            "message" => "Icon Details are added successfully!",
        ]);
    }
    public function sectionUpdate(IconSection $icon,Request $request){
        if(!$request->hasFile('image')) {
            return response()->json([
                "status" => "ERROR",
                "message" => "Please upload Image or Video file!",
            ]);
        }

        $details =  $icon->icon_details()->create($request->all());
        if($request->hasFile('image')){
            $details->image = Storage::disk('public')->putFile('icon_section/details', $request->file('image'));
        }
        $mime =    $request->file('image')->getMimeType();
        $mime_type = $var = preg_split("#/#", $mime);
        $details->mime_type = $mime_type[0];
        $details->save();
        return response()->json([
            "status" => "OK",
            "message" => "Icon Details are added successfully!",
        ]);
    }
    public function sectionDelete(IconDetail $icon_details){
        if($icon_details->image){
            Storage::disk('public')->delete($icon_details->image);
        }
        $icon_details->delete();
        return response()->json([
            "status" => "OK",
            "message" => "One row has been deleted",
        ]);
    }

}
