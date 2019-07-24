<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Conner\Tagging\Taggable;
class Publicacion extends Model
{
    protected $table = 'publicacion';


    
    use Taggable;
    
    protected $fillable = [
        'titulo', 'descripcion', 'incluye', 'no_incluye',
    ];
    
    public function categoria()
    {
        return $this->belongsTo('App\Categoria', 'categoriaServ');
    }
    
    public function user()
    {
        return $this->belongsTo('App\Users', 'usuario');
    }
    
    public function publicacion()
    {
        return $this->belongsTo('App\Users', 'usuario');
    }
    
    public function scopeTitulo($query, $titulo)
    {
        if(trim($titulo) != ""){
        $query->where('titulo', "LIKE",  "%$titulo%");
        }
    }

    public function scopeCategoria($query, $categoria)
    {
        if($categoria != ""){
        $query->select('categoriaID')->where('descripcion', "LIKE",  "%$categoria%");
        }
    }
    
}
