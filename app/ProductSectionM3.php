<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSectionM3 extends Model
{
    protected $fillable = ['brand_id','design_id','description','btn_text','btn_link','single_image','btn_show','show_homepage'];
}
