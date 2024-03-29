<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\BrandDesign;
use App\Http\Controllers\Controller;
use App\IconSection;
use App\NewsDetail;
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
        $design = BrandDesign::where('slug',$request->route('design'))->first();
        if(!$design){
            return abort(404);
        }
        $my_brand = $request->session()->get('selected_brand', 'default');
        $news = NewsSection::where(['brand_id' => $my_brand->id,'design_id' => $design->id])->get();
        return view('admin.News_home.listing',['news' => $news, 'slug' => $my_brand->slug,'design' => $request->route('design') ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $design = BrandDesign::where('slug',$request->route('design'))->first();
        if(!$design){
            return abort(404);
        }
        $brand = new Brand();
        return response()->view('admin/News_home.form',['design' => $request->route('design')]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $design = BrandDesign::where('slug',$request->route('design'))->first();
        if(!$design){
            return abort(404);
        }
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
        $design = BrandDesign::where('slug',$request->route('design'))->first();
        $news = new NewsSection;
        $request->merge(['brand_id' => $brand->id,'design_id' => $design->id]);
        $news->fill($request->input());
        $news->save();
        $news->image = Storage::disk('public')->putFile('news_section', $request->file('image'));

        $news->save();
        $my_brand = $request->session()->get('selected_brand', 'default');
        return redirect()
            ->route('admin.mybrand.news',['slug' => $my_brand->slug,'design' => $request->route('design')])
            ->with('success', 'New news has been created');
    }
    public function destroy(Request $request){
        $design = BrandDesign::where('slug',$request->route('design'))->first();
        if(!$design){
            return abort(404);
        }
        $news = NewsSection::find($request->input('news'));
        if($news->image){
            Storage::disk('public')->delete($news->image);
        }
        $news->delete();
        $brand = $request->session()->get('selected_brand');
        return redirect()
            ->route('admin.mybrand.news',['slug'=> $brand->slug,'design' => $request->route('design') ])
            ->with('success', 'News has been deleted');
    }
    public function details(NewsSection $news,Request $request){
        $brand = $request->session()->get('selected_brand');

        JavaScript::put([
            'news' => $news,
            'detail_section' => $news->news_details
            ]
        );
        return response()->view('admin/News_home.details',['design' => $brand->brand_design->slug]);
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
    public function sectionUpdate(NewsSection $news,Request $request){
        if(!$request->hasFile('image')) {
            return response()->json([
                "status" => "ERROR",
                "message" => "Please upload Image or Video file!",
            ]);
        }

       $details =  $news->news_details()->create($request->all());
        if($request->hasFile('image')){
            $details->image = Storage::disk('public')->putFile('news_section/details', $request->file('image'));
        }
        $mime =    $request->file('image')->getMimeType();
        $mime_type = $var = preg_split("#/#", $mime);
        $details->mime_type = $mime_type[0];
       $details->save();
        return response()->json([
            "status" => "OK",
            "message" => "News Details are added successfully!",
        ]);
    }
    public function sectionDelete(NewsDetail $news_details){
        if($news_details->image){
            Storage::disk('public')->delete($news_details->image);
        }
       $news_details->delete();
        return response()->json([
            "status" => "OK",
            "message" => "One row has been deleted",
        ]);
    }
}
