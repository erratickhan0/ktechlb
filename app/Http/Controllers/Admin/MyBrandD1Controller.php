<?php

namespace App\Http\Controllers\Admin;

use App\D1SliderSection;
use App\D1SliderSection2;
use App\D1SliderSection3;
use App\Http\Controllers\Controller;
use App\ProductDetailsP1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MyBrandD1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $d1_slider = D1SliderSection::get();
        $d1_slider2 = D1SliderSection2::get();
        $d1_slider3 = D1SliderSection3::get();

        return view('admin.D1.listing',['d1_slider' => $d1_slider,'d1_slider2' => $d1_slider2,'d1_slider3' => $d1_slider3]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.P1.form',['p1' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $p1 = new ProductDetailsP1();
        $p1->fill($request->all());
        if($request->hasFile('image')) {
            $p1->image = Storage::disk('public')->putFile('p1', $request->file('image'));
        }
        if($request->hasFile('section2_image')) {
            $p1->section2_image = Storage::disk('public')->putFile('p1', $request->file('section2_image'));
        }
        $p1->save();


        return redirect()
            ->route('admin.p1.index')
            ->with('success', 'New Page has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductDetailsP1  $productDetailsP1
     * @return \Illuminate\Http\Response
     */
    public function show(ProductDetailsP1 $productDetailsP1)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductDetailsP1  $p1
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductDetailsP1 $p1)
    {
       return view('admin.P1.form',['p1' => $p1]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductDetailsP1  $productDetailsP1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductDetailsP1 $p1)
    {
        $p1->fill($request->all());
        if($request->hasFile('image')) {
            $p1->image = Storage::disk('public')->putFile('p1', $request->file('image'));
        }
        if($request->hasFile('section2_image')) {
            $p1->section2_image = Storage::disk('public')->putFile('p1', $request->file('section2_image'));
        }
        $p1->save();


        return redirect()
            ->route('admin.p1.edit',$p1->id)
            ->with('success', 'Page has been updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductDetailsP1  $p1
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductDetailsP1 $p1)
    {
        $p1->delete();
        return redirect()
            ->route('admin.p1.index')
            ->with('success', 'Page has been deleted');

    }
}
