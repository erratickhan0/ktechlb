<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class button2 extends Model
{
  protected $fillable = ['title','subtitle'];

    public function slide_changer()
    {
        return $this->hasMany(Button2SlideChanger::class,'button2_id');
    }

}
