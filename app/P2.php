<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class P2 extends Model
{
   public function slide_changer_1(){
       return $this->hasMany(P2SlideChanger1::class);
   }
    public function slide_changer_2(){
        return $this->hasMany(P2SlideChanger2::class);
    }
    public function slide_changer_3(){
        return $this->hasMany(P2SlideChanger3::class);
    }
}
