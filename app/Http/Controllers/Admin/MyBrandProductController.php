<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\BrandDesign;
use App\Http\Controllers\Controller;
use App\ProductSection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MyBrandProductController extends Controller
{

    protected $my_design = null;
    public function __construct(Request $request)
    {
        $this->my_design = BrandDesign::where('slug','m1')->first();
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
        $product_section = ProductSection::where('brand_id',$my_brand->id)->where('design_id',$this->my_design->id)->get();
        return view('admin.Product_home.listing',['products' => $product_section, 'slug' => $my_brand->slug ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('admin/Product_home.form');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->hasFile('product_image')) {
            return Redirect::back()->withErrors([
                'msg' => 'Image file is not attached'
            ]);
        }

        $validator = Validator::make($request->all(),[
            'title'=> 'required',
            'product_image' => 'required|mimes:jpg,jpeg,png,gif',
            'product_logo' => 'required|mimes:jpg,jpeg,png,gif',
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        $brand = $request->session()->get('selected_brand', 'default');

        $product = new ProductSection();
        $request->merge(['brand_id' => $brand->id,'design_id' => $this->my_design->id]);
        $product->fill($request->input());
        $product->save();
        if($request->hasFile('product_image')) {
            $product->product_image = Storage::disk('public')->putFile('product_section', $request->file('product_image'));
        }
        if($request->hasFile('product_logo')) {
            $product->product_logo = Storage::disk('public')->putFile('product_section/product_logo', $request->file('product_logo'));
        }
        $product->save();
        $my_brand = $request->session()->get('selected_brand', 'default');
        return redirect()
            ->route('admin.mybrand.product',['slug' => $my_brand->slug])
            ->with('success', 'New icon has been created');
    }
    public function destroy(Request $request){
        $product = ProductSection::find($request->input('product'));
        if($product->product_image){
            Storage::disk('public')->delete($product->product_image);
        }
        if($product->product_logo){
            Storage::disk('public')->delete($product->product_logo);
        }

        $product->delete();
        $brand = $request->session()->get('selected_brand');
        return redirect()
            ->route('admin.mybrand.product',['slug'=> $brand->slug ])
            ->with('success', 'Product has been deleted');
    }
}
