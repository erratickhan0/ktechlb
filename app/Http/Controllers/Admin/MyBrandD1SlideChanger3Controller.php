<?php

namespace App\Http\Controllers\Admin;

use App\D1SliderSection3;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MyBrandD1SlideChanger3Controller extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('admin/D1Slider3.form');
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
            'description'=> 'required',
            'title' => 'required',
            'image' => 'required'
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        $slider = new D1SliderSection3();
        $slider->fill($request->input());
        $slider->save();
        $slider->image = Storage::disk('public')->putFile('d1_slider_section3', $request->file('image'));
        $slider->save();
        return redirect()
            ->route('admin.d1.index')
            ->with('success', 'New slide has been created');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\D1SliderSection3  $d1SliderSection3
     * @return \Illuminate\Http\Response
     */
    public function destroy(D1SliderSection3 $d1_slide_changer3)
    {
        if($d1_slide_changer3->image){
            Storage::disk('public')->delete($d1_slide_changer3->image);
        }

        $d1_slide_changer3->delete();
        return redirect()
            ->route('admin.d1.index')
            ->with('success', 'Slide has been deleted');

    }
}
