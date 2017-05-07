<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Tema extends Model
{
    use HasSlug;

    protected $table='tema';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $fillable=[
        'id','titulo','slug','mensaje','cat_id','user_id','visitas','like_tema','fecha'
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('titulo')
            ->saveSlugsTo('slug');
    }

}
