<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\P2;
use App\P2SlideChanger1;
use App\P2SlideChanger2;
use App\P2SlideChanger3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MyBrandP2SlideChanger3Controller extends Controller
{
    protected $p2 = null;

    public function __construct(Request $request)
    {
        if(!isset($request['p2'])){
            return abort(404);
        }

        if(isset($request['p2'])){
            $this->p2 = P2::find($request['p2']);

            if(!$this->p2){
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
        $this->p2->load('slide_changer_3');

        return view('admin.P2SlideChanger3.listing',['p2' => $this->p2]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.P2SlideChanger3.form',['slide_changer_3' => null]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductDetailsP1  $p1
     * @return \Illuminate\Http\Response
     */
    public function edit(P2SlideChanger3 $p2SlideChanger3)
    {
        return view('admin.P2SlideChanger3.form',['slide_changer_3' => $p2SlideChanger3]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slide_changer = new P2SlideChanger3();
        $slide_changer->title = $request->input('title');
        if($request->hasFile('image')) {
            $slide_changer->image = Storage::disk('public')->putFile('p2-slide-changer3', $request->file('image'));
        }
        $slide_changer->p2_id = $request->input('p2');

        $slide_changer->save();

        return redirect()
            ->route('admin.p2-slide-changer3.index',['p2' => $slide_changer->p2_id ])
            ->with('success', 'New Slide has been created');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\P2SlideChanger1  $p2SlideChanger1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, P2SlideChanger3 $p2SlideChanger3)
    {
        $p2SlideChanger3->title = $request->input('title');
        if($request->hasFile('image')) {
            $p2SlideChanger3->image = Storage::disk('public')->putFile('p2-slide-changer3', $request->file('image'));
        }
        $p2SlideChanger3->save();

        return redirect()
            ->route('admin.p2-slide-changer3.edit',[$p2SlideChanger3->id,'p2' => $p2SlideChanger3->p2_id])
            ->with('success', 'Slide has been updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(P2SlideChanger3 $p2SlideChanger3)
    {
        $p2SlideChanger3->delete();
        return redirect()
            ->route('admin.p2-slide-changer3.index',['p2' => $p2SlideChanger3->p2_id])
            ->with('success', 'Slide has been deleted');
    }
}
