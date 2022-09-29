<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSectionM2 extends Model
{
    protected $fillable = ['brand_id','design_id','left_description','right_description','btn_text','btn_link','btn_show','show_homepage'];
}
