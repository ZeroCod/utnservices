<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = 'imagen_publicacion';
    
    protected $fillable = ['nombre', 'publicacion_id'];
    
    public function publicacion()
    {
        return $this->belongsTo('App\Publicacion');
    }
    
}
