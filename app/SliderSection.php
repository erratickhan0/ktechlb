<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SliderSection extends Model
{
   protected $table= 'slider_sections';
   protected $fillable = ['title','description','brand_id','design_id','colour','file_path'];
}
