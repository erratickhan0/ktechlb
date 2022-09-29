<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ButtonAccordianSection extends Model
{
    protected $fillable = ['title','description','image','brand_id','design_id','show_button','show_accordian'];
}
