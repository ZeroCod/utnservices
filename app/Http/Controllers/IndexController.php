<?php

namespace App\Http\Controllers;
use App\Publicacion;
use Illuminate\Http\Request;
use App\Categoria;
use App\Sepomex;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){
        $publicaciones = DB::table('publicacion')->count();
        $sepomex = DB::table('sepomex')->select('idEstado','estado')->distinct()->get();
        $categorias = Categoria::select('categoriaID', 'descripcion')->get();
        
        return view('principal')->with('publicaciones', $publicaciones)
                                ->with('sepomex', $sepomex)
                                ->with('categorias', $categorias);
    }

    public function noticia()
    {
        $url = "https://www.reforma.com/rss/nacional.xml";
        $xml = simplexml_load_file($url);

        /* Aquí lo mejor es manipular la información de tu XML de acuerdo a lo que se mostrará en la vista */

        return view('index.noticias', ['xmlContent' => $xml]);
    }
}
