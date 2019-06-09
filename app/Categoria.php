<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria_servicios';
    
    public function publicaciones()
    {
        return $this->hasMany('App\Publicacion');
    }
}
