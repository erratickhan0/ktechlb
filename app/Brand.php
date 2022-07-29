<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;
    protected $fillable = ['active_state','name'];

    public function brand_design()
    {
        return $this->belongsTo(BrandDesign::class);
    }
    public function brand_settings()
    {
        return $this->hasOne(BrandSettings::class);
    }
    public function slider_section()
    {
        return $this->hasMany(SliderSection::class);
    }
    public function icon_section()
    {
        return $this->hasMany(IconSection::class);
    }
    public function product_section()
    {
        return $this->hasMany(ProductSection::class);
    }
}
