<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foro extends Model
{
    public function category(){
        return $this->belongsTo('App\Foro');
    }
}
