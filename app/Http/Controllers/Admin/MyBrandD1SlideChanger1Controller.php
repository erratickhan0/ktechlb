<?php

namespace App\Http\Controllers\Admin;

use App\D1SliderSection;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MyBrandD1SlideChanger1Controller extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('admin/D1Slider1.form');

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
        $slider = new D1SliderSection();
        $slider->fill($request->input());
        $slider->save();
        $slider->file_path = Storage::disk('public')->putFile('d1_slider_section', $request->file('file_path'));
        $slider->mime_type = $mime_type[0];
        $slider->save();
        return redirect()
            ->route('admin.d1.index')
            ->with('success', 'New slide has been created');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\D1SliderSection  $d1SliderSection
     * @return \Illuminate\Http\Response
     */
    public function destroy(D1SliderSection $d1_slide_changer1)
    {
        if($d1_slide_changer1->file_path){
            Storage::disk('public')->delete($d1_slide_changer1->file_path);
        }

        $d1_slide_changer1->delete();
        return redirect()
            ->route('admin.d1.index')
            ->with('success', 'Slide has been deleted');
    }
}
