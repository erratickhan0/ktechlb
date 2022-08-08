<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Http\Controllers\Controller;
use App\IconSection;
use App\NewsSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use JavaScript;

class MyBrandNewsSectionController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $my_brand = $request->session()->get('selected_brand', 'default');
        $brand = Brand::with('news_section')->where('slug',$my_brand->slug)->first();
        return view('admin.News_home.listing',['news' => $brand->news_section, 'slug' => $brand->slug ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = new Brand();
        return response()->view('admin/News_home.form');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->hasFile('image')) {
            return Redirect::back()->withErrors([
                'msg' => 'Image file is not attached'
            ]);
        }

        $validator = Validator::make($request->all(),[
            'image' => 'required|mimes:jpg,jpeg,png,gif',
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        $brand = $request->session()->get('selected_brand', 'default');

        $news = new NewsSection;
        $request->merge(['brand_id' => $brand->id]);
        $news->fill($request->input());
        $news->save();
        $news->image = Storage::disk('public')->putFile('news_section', $request->file('image'));

        $news->save();
        $my_brand = $request->session()->get('selected_brand', 'default');
        return redirect()
            ->route('admin.mybrand.news',['slug' => $my_brand->slug])
            ->with('success', 'New news has been created');
    }
    public function destroy(Request $request){
        $news = NewsSection::find($request->input('news'));
        if($news->image){
            Storage::disk('public')->delete($news->image);
        }
        $news->delete();
        $brand = $request->session()->get('selected_brand');
        return redirect()
            ->route('admin.mybrand.news',['slug'=> $brand->slug ])
            ->with('success', 'News has been deleted');
    }
    public function details(NewsSection $news){
        JavaScript::put([

                'news' => $news
            ]
        );
        return response()->view('admin/News_home.details');

    }
    public function update(NewsSection $news,Request $request){
       $news->fill($request->all());
       if($request->hasFile('image')){
           $news->image = Storage::disk('public')->putFile('news_section', $request->file('image'));
       }
        if($request->hasFile('details_background_image1')){
            $news->details_background_image1 = Storage::disk('public')->putFile('news_section', $request->file('details_background_image1'));
        }
        if($request->hasFile('details_background_image2')){
            $news->details_background_image2 = Storage::disk('public')->putFile('news_section', $request->file('details_background_image2'));
        }
        $news->save();
        return response()->json([
            "status" => "OK",
            "message" => "News Details are added successfully!",
        ]);
    }
}
