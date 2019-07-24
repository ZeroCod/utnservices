<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publicacion;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;
use App\Imagen;
use App\Categoria;
use App\Sepomex;
use App\Tagged;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index(Request $request)
    {
        $titulo = $request->titulo;
        $categoria = $request->categoria;

        $estados = Sepomex::select('estado')->distinct()->get();

        $categorias = Categoria::orderBy('descripcion', 'ASC')->get();
        
        $publicacion = Publicacion::titulo($titulo)
                                    ->orderBy('created_at', 'DESC')->paginate(10);
        
        $img = Imagen::all();

        $tags = Tagged::all();

        $users = User::all();
             
        return view('home')->with('publicacion', $publicacion)->with('img', $img)->with('categorias', $categorias)
        ->with('estados', $estados)->with('tags', $tags)->with('users', $users);    
    }

    public function buscarCategoria($categoria){
        $cat = Categoria::select('categoriaID')->where('descripcion', "LIKE",  "%$categoria%")->first();

        $estados = Sepomex::select('estado')->distinct()->get();

        $categorias = Categoria::orderBy('descripcion', 'ASC')->get();
        
        $publicacion = Publicacion::where('categoriaServ', $cat->categoriaID)->orderBy('created_at', 'DESC')->paginate(10);
        
        $img = Imagen::all();

        $tags = Tagged::all();

        $users = User::all();
             
        return view('home')->with('publicacion', $publicacion)->with('img', $img)->with('categorias', $categorias)
        ->with('estados', $estados)->with('tags', $tags)->with('users', $users);    
    }

    public function buscarTag($tag){

       $tags = Tagged::select('taggable_id')->where('tag_name', "LIKE",  "%$tag%")->first();

        $estados = Sepomex::select('estado')->distinct()->get();

        $categorias = Categoria::orderBy('descripcion', 'ASC')->get();
        
        $publicacion = Publicacion::where('postID', $tags->taggable_id)->orderBy('created_at', 'DESC')->paginate(10);
        
        $img = Imagen::all();

        $tags = Tagged::all();

        $users = User::all();
             
        return view('home')->with('publicacion', $publicacion)->with('img', $img)->with('categorias', $categorias)
        ->with('estados', $estados)->with('tags', $tags)->with('users', $users);   

    }



}
