<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;
    protected $fillable = ['active_state','name'];

    public function brand_design()
    {
        return $this->belongsTo(BrandDesign::class);
    }
}
