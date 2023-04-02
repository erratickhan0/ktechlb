<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\P2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MyBrandP2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $p2List = P2::all();

        return view('admin.P2.listing', ['p2' => $p2List]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.P2.form',['p2' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:191',
            'description' => 'nullable|max:191',
            'link' => 'nullable|max:191',
            'bg_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $p2 = new P2();
        $p2->title = $validatedData['title'];
        $p2->description = $validatedData['description'];
        $p2->link = $validatedData['link'];

        if ($request->hasFile('bg_image')) {
            $bgImage = $request->file('bg_image');
            $bgImageName = time() . '_' . $bgImage->getClientOriginalName();

            $p2->bg_image = Storage::disk('public')->putFileAs('p2', $bgImage, $bgImageName);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $p2->image = Storage::disk('public')->putFileAs('p2', $image, $imageName);
            $p2->mime_type = $image->getClientOriginalExtension();
        }

        $p2->save();

        return redirect()->route('admin.p2.index')
            ->with('success','P2 created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $p2 = P2::find($id);
        return view('admin.P2.show', compact('p2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $p2 = P2::find($id);
        return view('admin.P2.form', compact('p2'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $p2 = P2::find($id);
        if (!$p2) {
            return response()->json(['error' => 'P2 not found'], 404);
        }

        $validatedData = $request->validate([
            'title' => 'required|max:191',
            'description' => 'required|max:191',
            'link' => 'required|max:191',
            'bg_image' => 'nullable|image|max:2048',
            'image' => 'nullable|image|max:2048',
        ]);

        $p2->title = $validatedData['title'];
        $p2->description = $validatedData['description'];
        $p2->link = $validatedData['link'];

        if ($request->hasFile('bg_image')) {
            $bg_image = $request->file('bg_image');
            $bg_image_name = time() . '_' . $bg_image->getClientOriginalName();
            $p2->bg_image = Storage::disk('public')->putFileAs('p2', $bg_image, $bg_image_name);
            $p2->mime_type = $bg_image->getClientMimeType();
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '_' . $image->getClientOriginalName();
            $p2->image = Storage::disk('public')->putFileAs('p2', $image, $image_name);
            $p2->mime_type = $image->getClientMimeType();
        }

        $p2->save();

        return redirect()->route('admin.p2.index')->with('success', 'P2 updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $p2 = P2::find($id);
        if (!$p2) {
            return response()->json(['error' => 'P2 not found'], 404);
        }

        $p2->delete();

        return redirect()->route('admin.p2.index')->with('success', 'P2 deleted successfully');
    }

}
