<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Categoria;
use App\Publicacion;
use App\User;
use DB;
use App\Imagen;
use Symfony\Component\HttpFoundation\Session\Flash;
use Illuminate\Support\Facades\Auth;

class PublicacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function crear(){
       $categorias = Categoria::orderBy('descripcion', 'ASC')->get();
       
       return view('publicaciones.crear', compact('categorias'));
    }
    
    public function store(Request $request){
        $tags = explode(',', $request->tags);
        if($request->file('image')){
        $file = $request->image;
        $name = 'servicesutn_' .time() . '.' . $file->getClientOriginalExtension();
        $path = public_path() . '\imagenes\publicaciones';
         $file->move($path, $name);
        }
        
        $publicacion = new Publicacion();
        

        $publicacion->titulo = $request->titulo;
        $publicacion->categoriaServ = $request->categoriaServ;
        $publicacion->descripcion = $request->descripcion;
        $publicacion->incluye = $request->incluye;
        $publicacion->no_incluye = $request->no_incluye;
        $publicacion->titulo = $request->titulo;
        $publicacion->usuario = Auth::user()->id;
        $publicacion->save();
        $publicacion->tag($tags);
        
        $imagen = new Imagen();
        $imagen->nombre = $name;
        $imagen->publicacion()->associate($publicacion);
        $imagen->save();
        
//        Flash::sucess('Se ha creado la publicación' . $publicacion->titulo . ' de forma satisfactoria');
        
        return redirect('/home')->with('info', 'Post creado con éxito');
    }
    
    public function prueba(){
        $publicacion = DB::table('publicacion')->first();
        $titulo = ucwords($publicacion->titulo);
        return $titulo;
        
//        $sql = "select * from publicacion, tagging_tagged where publicacion.postID = tagging_tagged.taggable_id and tagging_tagged.tag_name='Medicina'";
//        return DB::select($sql,array(1,20));
    }
    
}
