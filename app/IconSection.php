<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IconSection extends Model
{
    protected $table= 'icon_section';
    protected $fillable = ['title','brand_id','file_path','details_title','details_subtitle','details_heading','details_title_color','details_description'];

    public function icon_details(){
        return $this->hasMany(IconDetail::class);
    }
    public function icon_detail_slider(){
        return $this->hasMany(IconDetailSlider::class);
    }
}
