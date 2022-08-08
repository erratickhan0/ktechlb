<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsSection extends Model
{
   protected $fillable = ['brand_id','title','details_title','details_subtitle','details_heading','details_title_color','details_description'];
}
