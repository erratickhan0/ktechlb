<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsSection extends Model
{
   protected $fillable = ['brand_id','design_id','title','details_title','details_subtitle','details_heading','details_title_color','details_description'];

   public function news_details(){
       return $this->hasMany(NewsDetail::class);
   }

}
