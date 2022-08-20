<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\FlipBook;
use App\FlipBookSlider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use JavaScript;

class FlipbookController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request){
        $my_brand = $request->session()->get('selected_brand', 'default');
        $brand = Brand::with('flipbook')->where('slug',$my_brand->slug)->first();
        JavaScript::put([
                'brand' => $my_brand,
                'flipbooks' => $brand->flipbook,
                'flipbook_slider' => $brand->flipbook ? $brand->flipbook->flipbook_slider:''
            ]
        );
        return view('admin.Flipbook.form',['flipbook' => $brand->flipbook, 'slug' => $brand->slug ]);
    }
    public function section2Store(Request $request,Brand $brand){
        $data = $request->all();
        $data['brand_id'] = $brand->id;
        $flipbook = FlipBook::updateOrCreate(
            ['id' => $data['id']],
            $data
        );
        return response()->json([
            "status" => "OK",
            "message" => "Section2 details are being saved!",
        ]);

    }
    public function section3Store(Request $request,Brand $brand){
        $data = $request->all();
        $data['brand_id'] = $brand->id;
        $flipbook = FlipBook::updateOrCreate(
            ['id' => $data['id']],
            $data
        );
        if ($request->hasFile('section3_image')) {
            $flipbook->section3_image = Storage::disk('public')->putFile('flipbook/section3', $request->file('section3_image'));
        }
        $flipbook->save();

        return response()->json([
            "status" => "OK",
            "message" => "Section3 details are being saved!",
        ]);

    }
    public function section2Slider(FlipBook $flipbook,Request $request){
        if(!$request->hasFile('image')) {
            return response()->json([
                "status" => "ERROR",
                "message" => "Please upload Image or Video file!",
            ]);
        }
        $flipbook_slider = new FlipBookSlider();
        if($request->hasFile('image')){
            $flipbook_slider->image = Storage::disk('public')->putFile('flipbook/slider', $request->file('image'));
        }
        $mime =    $request->file('image')->getMimeType();
        $mime_type = $var = preg_split("#/#", $mime);
        $flipbook_slider->mime_type = $mime_type[0];
        $flipbook_slider->flipbook_id = $flipbook->id;
        $flipbook_slider->save();
        return response()->json([
            "status" => "OK",
            "message" => "Slider Details are added successfully!",
        ]);
    }
    public function sectionDelete(FlipBookSlider $flipbook_slider){
        if($flipbook_slider->image){
            Storage::disk('public')->delete($flipbook_slider->image);
        }
        $flipbook_slider->delete();
        return response()->json([
            "status" => "OK",
            "message" => "One row has been deleted",
        ]);

    }

}
