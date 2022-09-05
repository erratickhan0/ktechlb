<?php

namespace App\Http\Controllers\Admin;

use App\BrandDesign;
use App\Http\Controllers\Controller;
use App\ProductSectionM3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MyBrandProductM3Controller extends Controller
{
    protected $my_design = null;
    public function __construct(Request $request)
    {
        $this->my_design = BrandDesign::where('slug','m3')->first();
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
        $products = ProductSectionM3::where(['brand_id' => $my_brand->id,'design_id' => $this->my_design->id])->get();
        return view('admin.Product_M3_home.listing',['products' => $products, 'slug' => $my_brand->slug ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('admin/Product_M3_home.form');
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
            'image1' => 'required|mimes:jpg,jpeg,png,gif',
            'single_image' => 'required'
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        $brand = $request->session()->get('selected_brand', 'default');

        $product = new ProductSectionM3();
        $request->merge(['brand_id' => $brand->id,'design_id' => $this->my_design->id]);
        $product->fill($request->input());
        $product->save();
        if($request->hasFile('image1')) {
            $product->image1 = Storage::disk('public')->putFile('product_section_m3', $request->file('image1'));
        }
        if($request->hasFile('image2')) {
            $product->image2 = Storage::disk('public')->putFile('product_section_m3', $request->file('image2'));
        }
        $product->save();
        $my_brand = $request->session()->get('selected_brand', 'default');
        return redirect()
            ->route('admin.mybrand.product-m3',['slug' => $my_brand->slug])
            ->with('success', 'New Product has been created');
    }
    public function destroy(Request $request){
        $product = ProductSectionM3::find($request->input('product'));
        if($product->image1){
            Storage::disk('public')->delete($product->image1);
        }
        if($product->image2){
            Storage::disk('public')->delete($product->image2);
        }

        $product->delete();
        $brand = $request->session()->get('selected_brand');
        return redirect()
            ->route('admin.mybrand.product-m3',['slug'=> $brand->slug ])
            ->with('success', 'Product has been deleted');
    }

}
