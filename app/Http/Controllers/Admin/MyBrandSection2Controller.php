<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\BrandDesign;
use App\Http\Controllers\Controller;
use App\Section2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use JavaScript;

class MyBrandSection2Controller extends Controller
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
        $section2 = Section2::where('brand_id',$my_brand->id)->where('design_id', $this->my_design->id)->first();
        return view('admin.Section2_home.form',['section2' => $section2, 'slug' => $my_brand->slug, 'design' => $this->my_design->slug ]);
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
            'description'=> 'required',

        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        $brand = $request->session()->get('selected_brand', 'default');

        $section2 = new Section2();
        $request->merge(['brand_id' => $brand->id,'design_id' => $this->my_design->id]);
        $section2->fill($request->input());
        $section2->save();
        return redirect()
            ->route('admin.mybrand.section2',['slug' => $brand->slug,'design' => $this->my_design->slug])
            ->with('success', 'Record is saved');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Section2 $section2,Request $request)
    {
        $section2->fill($request->input());
        $section2->save();
        $brand = $request->session()->get('selected_brand', 'default');
        return redirect()
            ->route('admin.mybrand.section2',['slug' => $brand->slug,'design' => $this->my_design->slug])
            ->with('success', 'Section2 are updated successfully!');
    }
}
