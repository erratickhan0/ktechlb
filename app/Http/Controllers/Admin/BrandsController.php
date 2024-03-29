<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\BrandDesign;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use JavaScript;


class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $brands = Brand::get();
        return response()->view('admin/brands/listing', [
                'brands' => $brands
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand_designs = BrandDesign::get();
        JavaScript::put([
            'brand' => '',
            'brand_designs' => $brand_designs
            ]
        );

        $brand = new Brand();
        return response()->view('admin/brands/form', [ 'brand' => $brand
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand = new Brand();
        if ($request->hasFile('logo')) {
            $brand->logo = Storage::disk('public')->putFile('logos', $request->file('logo'));
        }
        else{
            return response()->json([
                "status" => "ERROR",
                "message" => "Please add brand logo!",
            ]);
        }
        if ($request->hasFile('cover')) {
            $brand->cover = Storage::disk('public')->putFile('covers', $request->file('cover'));
        }
        else{
            return response()->json([
                "status" => "ERROR",
                "message" => "Please add brand cover!",
            ]);
        }
        $brand->name = $request->input('name');
        $brand->slug = Str::slug($request->input('name'));
        $brand->active_state = (bool)$request->input('active_state');
        $brand->brand_design_id = $request->input('brand_design_id');
        $brand->user_id = auth()->user()->id;
        $brand->save();
        return response()->json([
            "status" => "OK",
            "message" => "Brand has been added successfully!",
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        $brand_designs = BrandDesign::get();
        JavaScript::put([
                'brand' => $brand,
                'brand_designs' => $brand_designs
            ]
        );

        return response()->view('admin/brands/form', [
        'brand' => $brand ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $brand->fill($request->only('name','active_state','brand_design_id'));
        if ($request->hasFile('logo')) {
            Storage::delete($brand->logo);
            $brand->logo = Storage::disk('public')->putFile('logos', $request->file('logo'));
        }
        if ($request->hasFile('cover')) {
            Storage::delete($brand->cover);
            $brand->cover = Storage::disk('public')->putFile('covers', $request->file('cover'));
        }

        $brand->save();
        return response()->json([
            "status" => "OK",
            "message" => "Brand has been updated successfully!",
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        Session::put('selected_brand',[]);
        $brand->delete();
        return redirect()
            ->route('admin.brands.index')
            ->with('success', 'Brand has been deleted');
    }
}
