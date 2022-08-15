<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IconDetail extends Model
{
    protected $fillable = ['icon_section_id','heading','mime_type','description'];
}
