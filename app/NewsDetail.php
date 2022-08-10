<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsDetail extends Model
{
    protected $fillable = ['news_section_id','heading','mime_type','description'];
}
