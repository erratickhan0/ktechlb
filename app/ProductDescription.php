<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDescription extends Model
{
    protected $fillable = ['brand_id','design_id','description1','description2','description3','image','background_image'];
}
