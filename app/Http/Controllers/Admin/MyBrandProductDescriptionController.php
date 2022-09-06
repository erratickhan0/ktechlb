<?php

namespace App\Http\Controllers\Admin;

use App\ProductDescription;
use App\BrandDesign;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MyBrandProductDescriptionController extends Controller
{
    protected $my_design = null;
    public function __construct(Request $request)
    {
        $this->my_design = BrandDesign::where('slug',$request->route('design'))->first();
        if(!$this->my_design){
            return abort(404);
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $my_brand = $request->session()->get('selected_brand', 'default');
        $ProductDescription = ProductDescription::where('brand_id',$my_brand->id)->where('design_id', $this->my_design->id)->first();
        return view('admin.ProductDescription_home.form',['product_description' => $ProductDescription, 'slug' => $my_brand->slug, 'design' => $this->my_design->slug ]);
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
            'description1' => 'required',
            'description2' => 'required',
            'description3' => 'required',
            'background_image' => 'required|mimes:jpg,jpeg,png,gif',
            'image' => 'required|mimes:jpg,jpeg,png,gif',
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        $brand = $request->session()->get('selected_brand', 'default');

        $ProductDescription = new ProductDescription();
        $request->merge(['brand_id' => $brand->id,'design_id' => $this->my_design->id]);
        $ProductDescription->fill($request->input());
        if ($request->hasFile('background_image')) {
            $ProductDescription->background_image = Storage::disk('public')->putFile('product_description', $request->file('background_image'));
        }
        if ($request->hasFile('image')) {
            $ProductDescription->image = Storage::disk('public')->putFile('product_description', $request->file('image'));
        }
        $ProductDescription->save();
        return redirect()
            ->route('admin.mybrand.product-description',['slug' => $brand->slug,'design' => $this->my_design->slug])
            ->with('success', 'Record is saved');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(ProductDescription $ProductDescription,Request $request)
    {
        $ProductDescription->fill($request->input());
        if ($request->hasFile('background_image')) {
            $ProductDescription->background_image = Storage::disk('public')->putFile('product_description', $request->file('background_image'));
        }
        $ProductDescription->save();
        $brand = $request->session()->get('selected_brand', 'default');
        return redirect()
            ->route('admin.mybrand.product-description',['slug' => $brand->slug,'design' => $this->my_design->slug])
            ->with('success', 'ProductDescription are updated successfully!');
    }

}
