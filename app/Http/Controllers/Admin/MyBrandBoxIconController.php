<?php

namespace App\Http\Controllers\Admin;

use App\BoxIconSection;
use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MyBrandBoxIconController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $my_brand = $request->session()->get('selected_brand', 'default');
        $brand = Brand::with('boxicon_section')->where('slug',$my_brand->slug)->first();

        return view('admin.BoxIcon_home.listing',['box_icon' => $brand->boxicon_section, 'slug' => $brand->slug ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = new Brand();
        return response()->view('admin/BoxIcon_home.form');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->hasFile('box_icon')) {
            return Redirect::back()->withErrors([
                'msg' => 'Image file is not attached'
            ]);
        }

        $validator = Validator::make($request->all(),[
            'title'=> 'required',
            'description'=> 'required',
            'box_icon' => 'required|mimes:jpg,jpeg,png,gif',
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        $brand = $request->session()->get('selected_brand', 'default');

        $box_icon = new BoxIconSection();
        $request->merge(['brand_id' => $brand->id]);
        $box_icon->fill($request->input());
        $box_icon->save();
        $box_icon->box_icon = Storage::disk('public')->putFile('boxicon_section', $request->file('box_icon'));
        $box_icon->save();

        return redirect()
            ->route('admin.mybrand.box-icon',['slug' => $brand->slug])
            ->with('success', 'New icon has been created');
    }

    public function destroy(Request $request){
        $box_icon = BoxIconSection::find($request->input('box_icon'));
        if($box_icon->box_icon){
            Storage::disk('public')->delete($box_icon->box_icon);
        }
        $box_icon->delete();
        $brand = $request->session()->get('selected_brand');
        return redirect()
            ->route('admin.mybrand.box-icon',['slug'=> $brand->slug ])
            ->with('success', 'Box Icon has been deleted');
    }

}
