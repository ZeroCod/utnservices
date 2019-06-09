<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{
    protected $table = 'experiencia_usuario';
        
    protected $fillable = [
        'detalle', 'categoria',
    ];
}
