<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;
    protected $fillable = ['active_state','name','brand_design_id'];

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
    public function boxicon_section()
    {
        return $this->hasMany(BoxIconSection::class);
    }
    public function product_section()
    {
        return $this->hasMany(ProductSection::class);
    }
    public function banner_section()
    {
        return $this->hasOne(HomepageBanners::class);
    }
    public function logo_title_section()
    {
        return $this->hasOne(LogoTitleSection::class);
    }
    public function button_accordian_section()
    {
        return $this->hasOne(ButtonAccordianSection::class);
    }
    public function news_section()
    {
        return $this->hasMany(NewsSection::class);
    }

    public function flipbook()
    {
        return $this->hasOne(FlipBook::class);
    }
    public function section2()
    {
        return $this->hasOne(Section2::class);
    }
    public function product_m2()
    {
        return $this->hasMany(ProductSectionM2::class);
    }
    public function section5()
    {
        return $this->hasOne(Section5::class);
    }
    public function section6()
    {
        return $this->hasOne(Section6::class);
    }
    public function article_section()
    {
        return $this->hasMany(ArticleSection::class);
    }
    public function product_m3()
    {
        return $this->hasMany(ProductSectionM3::class);
    }
}
