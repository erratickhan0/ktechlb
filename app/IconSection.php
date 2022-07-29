<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IconSection extends Model
{
    protected $table= 'icon_section';
    protected $fillable = ['title','brand_id','file_path'];
}
