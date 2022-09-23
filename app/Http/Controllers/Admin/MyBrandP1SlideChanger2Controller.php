<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\P1SlideChanger;
use App\P1SlideChanger2;
use App\ProductDetailsP1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MyBrandP1SlideChanger2Controller extends Controller
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
        $this->p1->load('slide_changer2');
        return view('admin.P1SlideChanger2.listing',['p1' => $this->p1]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.P1SlideChanger2.form',['slide_changer2' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slide_changer = new P1SlideChanger2();
        $slide_changer->fill($request->all());
        if($request->hasFile('image')) {
            $slide_changer->image = Storage::disk('public')->putFile('p1-slide-changer2', $request->file('image'));
        }
        $slide_changer->p1_id = $request->input('p1');
        $slide_changer->save();


        return redirect()
            ->route('admin.p1-slide-changer2.index',['p1' => $slide_changer->p1_id ])
            ->with('success', 'New Slide has been created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductDetailsP1  $p1
     * @return \Illuminate\Http\Response
     */
    public function edit(P1SlideChanger2 $p1SlideChanger2)
    {
       return view('admin.P1SlideChanger2.form',['slide_changer2' => $p1SlideChanger2]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductDetailsP1  $productDetailsP1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, P1SlideChanger2 $p1SlideChanger2)
    {
        $p1SlideChanger2->fill($request->all());
        if($request->hasFile('left_image')) {
            $p1SlideChanger2->image = Storage::disk('public')->putFile('p1-slide-changer2', $request->file('image'));
        }
        $p1SlideChanger2->save();


        return redirect()
            ->route('admin.p1-slide-changer2.edit',[$p1SlideChanger2->id,'p1' => $p1SlideChanger2->p1_id])
            ->with('success', 'Slide has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductDetailsP1  $p1
     * @return \Illuminate\Http\Response
     */
    public function destroy(P1SlideChanger2 $p1SlideChanger2)
    {
        $p1SlideChanger2->delete();
        return redirect()
            ->route('admin.p1-slide-changer2.index',['p1' => $p1SlideChanger2->p1_id])
            ->with('success', 'Slide has been deleted');
    }
}
