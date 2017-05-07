<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubComentario extends Model
{
    protected $table='sub_comentario';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $fillable=[
        'id','sub_comentario','id_comentario','sub_slug','sub_user_id','sub_cat_id','sub_tema_id','sub_fecha'
    ];
}
