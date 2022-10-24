<?php

namespace App\Http\Controllers\Admin;

use App\button2;
use App\Button2SlideChanger;
use App\Http\Controllers\Controller;
use App\P1SlideChanger;
use App\ProductDetailsP1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MyButton2SlideChangerController extends Controller
{


    protected $button2 = null;
    public function __construct(Request $request)
    {
        if(!isset($request['button2'])){
            return abort(404);

        }
        if(isset($request['button2'])){
            $this->button2 = button2::find($request['button2']);
            if(!$this->button2){
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
        $this->button2->load('slide_changer');

        return view('admin.Button2SlideChanger.listing',['button2' => $this->button2]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Button2SlideChanger.form',['slide_changer' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slide_changer = new Button2SlideChanger();
        $slide_changer->fill($request->all());
        if($request->hasFile('image')) {
            $slide_changer->image = Storage::disk('public')->putFile('button2-slide-changer', $request->file('image'));
        }
        $slide_changer->button2_id = $request->input('button2');
        $slide_changer->save();


        return redirect()
            ->route('admin.button2-slide-changer.index',['button2' => $slide_changer->button2_id ])
            ->with('success', 'New Slide has been created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductDetailsP1  $p1
     * @return \Illuminate\Http\Response
     */
    public function edit(Button2SlideChanger  $button2SlideChanger)
    {
       return view('admin.Button2SlideChanger.form',['slide_changer' => $button2SlideChanger]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductDetailsP1  $productDetailsP1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Button2SlideChanger $button2SlideChanger)
    {
        $button2SlideChanger->fill($request->all());
        if($request->hasFile('image')) {
            $button2SlideChanger->image = Storage::disk('public')->putFile('button2-slide-changer', $request->file('image'));
        }
        $button2SlideChanger->save();

        return redirect()
            ->route('admin.button2-slide-changer.edit',[$button2SlideChanger->id,'button2' => $button2SlideChanger->button2_id])
            ->with('success', 'Slide has been updated');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductDetailsP1  $p1
     * @return \Illuminate\Http\Response
     */
    public function destroy(Button2SlideChanger $button2SlideChanger)
    {
        $button2SlideChanger->delete();
        return redirect()
            ->route('admin.button2-slide-changer.index',['button2' => $button2SlideChanger->button2_id])
            ->with('success', 'Slide has been deleted');
    }
}
