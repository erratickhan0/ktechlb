<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\P1SlideChanger;
use App\ProductDetailsP1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MyBrandP1SlideChangerController extends Controller
{


    protected $p1 = null;
    public function __construct(Request $request)
    {
        if(!isset($request['p1'])){
            return abort(404);

        }
        if(isset($request['p1'])){
            $this->p1 = ProductDetailsP1::find($request['p1']);
            if(!$this->p1){
                return abort(404);
            }
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->p1->load('slide_changer');

        return view('admin.P1SlideChanger.listing',['p1' => $this->p1]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.P1SlideChanger.form',['slide_changer' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slide_changer = new P1SlideChanger();
        $slide_changer->fill($request->all());
        if($request->hasFile('left_image')) {
            $slide_changer->left_image = Storage::disk('public')->putFile('p1-slide-changer', $request->file('left_image'));
        }
        if($request->hasFile('right_image')) {
            $slide_changer->right_image = Storage::disk('public')->putFile('p1-slide-changer', $request->file('right_image'));
        }
        if($request->hasFile('right_bg_image')) {
            $slide_changer->right_bg_image = Storage::disk('public')->putFile('p1-slide-changer', $request->file('right_bg_image'));
        }
        $slide_changer->p1_id = $request->input('p1');
        $slide_changer->save();


        return redirect()
            ->route('admin.p1-slide-changer.index',['p1' => $slide_changer->p1_id ])
            ->with('success', 'New Slide has been created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductDetailsP1  $p1
     * @return \Illuminate\Http\Response
     */
    public function edit(P1SlideChanger $p1SlideChanger)
    {
       return view('admin.P1SlideChanger.form',['slide_changer' => $p1SlideChanger]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductDetailsP1  $productDetailsP1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, P1SlideChanger $p1SlideChanger)
    {
        $p1SlideChanger->fill($request->all());
        if($request->hasFile('left_image')) {
            $p1SlideChanger->left_image = Storage::disk('public')->putFile('p1-slide-changer', $request->file('left_image'));
        }
        if($request->hasFile('right_image')) {
            $p1SlideChanger->right_image = Storage::disk('public')->putFile('p1-slide-changer', $request->file('right_image'));
        }
        if($request->hasFile('right_bg_image')) {
            $p1SlideChanger->right_bg_image = Storage::disk('public')->putFile('p1-slide-changer', $request->file('right_bg_image'));
        }

        $p1SlideChanger->save();


        return redirect()
            ->route('admin.p1-slide-changer.edit',[$p1SlideChanger->id,'p1' => $p1SlideChanger->p1_id])
            ->with('success', 'Slide has been updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductDetailsP1  $p1
     * @return \Illuminate\Http\Response
     */
    public function destroy(P1SlideChanger $p1SlideChanger)
    {
        $p1SlideChanger->delete();
        return redirect()
            ->route('admin.p1-slide-changer.index',['p1' => $p1SlideChanger->p1_id])
            ->with('success', 'Slide has been deleted');

    }
}
