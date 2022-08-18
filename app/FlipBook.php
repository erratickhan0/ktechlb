<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FlipBook extends Model
{
    protected $fillable = ['brand_id','section_selector','section2_heading','section2_title','section2_description',
        'section3_heading','section3_title','section3_description','section3_image'];
}
