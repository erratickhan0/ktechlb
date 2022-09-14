<?php

namespace App\Http\Controllers\Admin;

use App\ArticleSection;
use App\Brand;
use App\BrandDesign;
use App\Http\Controllers\Controller;
use App\ProductSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MyBrandArticleController extends Controller
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
        $article = ArticleSection::where('brand_id',$my_brand->id)->where('design_id',$this->my_design->id)->get();
        return view('admin.Article_home.listing',['articles' => $article , 'slug' => $my_brand->slug,'design' => $this->my_design->slug ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $my_brand = $request->session()->get('selected_brand', 'default');
        return response()->view('admin/Article_home.form',['slug' => $my_brand->slug,'design' => $this->my_design->slug ]);
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
            'heading'=> 'required',
            'image' => 'required|mimes:jpg,jpeg,png,gif,webp',
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        $brand = $request->session()->get('selected_brand', 'default');

        $article = new ArticleSection();
        $request->merge(['brand_id' => $brand->id,'design_id' => $this->my_design->id]);
        $article->fill($request->input());
        $article->save();

        if($request->hasFile('image')) {
            $article->image = Storage::disk('public')->putFile('article', $request->file('image'));
        }
        $article->save();
        $my_brand = $request->session()->get('selected_brand', 'default');
        return redirect()
            ->route('admin.mybrand.article',['slug' => $my_brand->slug,'design' => $this->my_design->slug])
            ->with('success', 'New Article has been created');
    }
    public function destroy(Request $request){
        $article = ArticleSection::find($request->input('article'));
        if($article->image){
            Storage::disk('public')->delete($article->image);
        }
        $article->delete();
        $brand = $request->session()->get('selected_brand');
        return redirect()
            ->route('admin.mybrand.article',['slug'=> $brand->slug,'design' => $this->my_design->slug ])
            ->with('success', 'Article has been deleted');
    }

}
