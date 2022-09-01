<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomepageBanners extends Model
{
    protected $fillable = ['brand_id','design_id','fullwidth_banner1_fixed','fullwidth_banner2_fixed','fullwidth_banner1_unfixed','fullwidth_video'];
}
