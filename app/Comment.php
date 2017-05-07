<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table='comentarios';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $fillable=[
        'id','name','comentario','like','slug','user_id','cat_id','tema_id','fecha','genero'
    ];

}
