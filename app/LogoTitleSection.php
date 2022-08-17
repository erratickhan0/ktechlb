<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogoTitleSection extends Model
{
   protected $fillable = ['title1','title2','logo','description','brand_id','details_title','details_subtitle','details_heading','details_title_color','details_description'];

    public function logo_title_details(){
        return $this->hasMany(LogoTitleDetail::class);
    }
}
