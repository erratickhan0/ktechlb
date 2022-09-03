<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSection extends Model
{
    protected $table = 'product_section';
    protected $fillable = ['title','brand_id','design_id','show_homepage','product_logo','product_image'];
}
