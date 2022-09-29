<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleSection extends Model
{
    protected $fillable = ['heading','description','brand_id','design_id','image','btn_text','btn_link','btn_show'];
}
