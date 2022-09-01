<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\BrandDesign;
use App\Http\Controllers\Controller;
use App\ProductSection;
use App\ProductSectionM2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MyBrandProductM2Controller extends Controller
{

    protected $my_design = null;
    public function __construct(Request $request)
    {
        $this->my_design = BrandDesign::where('slug','m2')->first();
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
        $products = ProductSectionM2::where(['brand_id' => $my_brand->id,'design_id' => $this->my_design->id])->get();
        return view('admin.Product_M2_home.listing',['products' => $products, 'slug' => $my_brand->slug ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('admin/Product_M2_home.form');
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
            'left_description'=> 'required',
            'right_description'=> 'required',
            'left_product_image' => 'required|mimes:jpg,jpeg,png,gif',
            'background_image' => 'required|mimes:jpg,jpeg,png,gif',
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        $brand = $request->session()->get('selected_brand', 'default');

        $product = new ProductSectionM2();
        $request->merge(['brand_id' => $brand->id,'design_id' => $this->my_design->id]);
        $product->fill($request->input());
        $product->save();
        if($request->hasFile('left_product_image')) {
            $product->left_product_image = Storage::disk('public')->putFile('product_section_m2', $request->file('left_product_image'));
        }
        if($request->hasFile('background_image')) {
            $product->background_image = Storage::disk('public')->putFile('product_section_m2', $request->file('background_image'));
        }
        if($request->hasFile('right_product_image1')) {
            $product->right_product_image1 = Storage::disk('public')->putFile('product_section_m2', $request->file('right_product_image1'));
        }
        if($request->hasFile('right_product_image2')) {
            $product->right_product_image2 = Storage::disk('public')->putFile('product_section_m2', $request->file('right_product_image2'));
        }
        if($request->hasFile('right_product_image3')) {
            $product->right_product_image3 = Storage::disk('public')->putFile('product_section_m2', $request->file('right_product_image3'));
        }
        if($request->hasFile('right_product_image4')) {
            $product->right_product_image4 = Storage::disk('public')->putFile('product_section_m2', $request->file('right_product_image4'));
        }

        $product->save();
        $my_brand = $request->session()->get('selected_brand', 'default');
        return redirect()
            ->route('admin.mybrand.product-m2',['slug' => $my_brand->slug])
            ->with('success', 'New Product has been created');
    }
    public function destroy(Request $request){
        $product = ProductSectionM2::find($request->input('product'));
        if($product->left_product_image){
            Storage::disk('public')->delete($product->left_product_image);
        }
        if($product->background_image){
            Storage::disk('public')->delete($product->background_image);
        }
        if($product->right_product_image1){
            Storage::disk('public')->delete($product->right_product_image1);
        }
        if($product->right_product_image2){
            Storage::disk('public')->delete($product->right_product_image2);
        }
        if($product->right_product_image3){
            Storage::disk('public')->delete($product->right_product_image3);
        }
        if($product->right_product_image4){
            Storage::disk('public')->delete($product->right_product_image4);
        }

        $product->delete();
        $brand = $request->session()->get('selected_brand');
        return redirect()
            ->route('admin.mybrand.product-m2',['slug'=> $brand->slug ])
            ->with('success', 'Product has been deleted');
    }
}
