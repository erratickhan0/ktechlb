<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetailsP1 extends Model
{
    protected $fillable  = ['heading','title','image','video_link','section2_heading','section2_title','section2_image',
        'page_font'];


    public function slide_changer()
    {
        return $this->hasMany(P1SlideChanger::class,'p1_id');
    }

}
