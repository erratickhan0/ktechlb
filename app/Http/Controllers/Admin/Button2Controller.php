<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\button2;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Button2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $button2 = button2::get();

        return view('admin.Button2.listing',['button2' => $button2]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Button2.form',['button2' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $button2 = new button2();
        $button2->fill($request->all());
        if($request->hasFile('image1')) {
            $button2->image1 = Storage::disk('public')->putFile('button2', $request->file('image1'));
        }
        if($request->hasFile('image2')) {
            $button2->image2 = Storage::disk('public')->putFile('button2', $request->file('image2'));
        }
        $button2->save();


        return redirect()
            ->route('admin.button2.index')
            ->with('success', 'New Page has been created');

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\button2  $button2
     * @return \Illuminate\Http\Response
     */
    public function edit(button2 $button2)
    {
        return view('admin.Button2.form',['button2' => $button2]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\button2  $button2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, button2 $button2)
    {
        $button2->fill($request->all());
        if($request->hasFile('image1')) {
            $button2->image1 = Storage::disk('public')->putFile('button2', $request->file('image1'));
        }
        if($request->hasFile('image2')) {
            $button2->image2 = Storage::disk('public')->putFile('button2', $request->file('image2'));
        }
        $button2->save();


        return redirect()
            ->route('admin.button2.edit',$button2->id)
            ->with('success', 'Page has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\button2  $button2
     * @return \Illuminate\Http\Response
     */
    public function destroy(button2 $button2)
    {
        $button2->delete();
        return redirect()
            ->route('admin.button2.index')
            ->with('success', 'Page has been deleted');

    }
}
