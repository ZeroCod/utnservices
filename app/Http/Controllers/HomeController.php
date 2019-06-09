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
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {



        $estados = Sepomex::select('estado')->distinct()->get();

        $categorias = Categoria::orderBy('descripcion', 'DESC')->get();
        
        $publicacion = Publicacion::titulo($request->get('titulo'))->orderBy('created_at', 'DESC')->paginate(5);
        
        $img = Imagen::all();

        $tags = Tagged::all();

        $users = User::all();
     
        
        return view('home')->with('publicacion', $publicacion)->with('img', $img)->with('categorias', $categorias)
        ->with('estados', $estados)->with('tags', $tags)->with('users', $users);
    
    }
}
