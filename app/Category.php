<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categorias';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $fillable=[
        'id','cat_nombre'
    ];

    public function foros(){
        return $this->hasMany('App\Foro');
    }
}
