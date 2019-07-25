<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Categoria;
use App\Publicacion;
use App\User;
use App\DetallePublicacion;
use DB;
use App\Imagen;
use Symfony\Component\HttpFoundation\Session\Flash;
use Illuminate\Support\Facades\Auth;

class PublicacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['crear', 'store']]);
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
        $publicacion->tel_contacto = $request->tel_contacto;
        $publicacion->tel_wsp = $request->tel_wsp;
        $publicacion->usuario = Auth::user()->id;
        $publicacion->save();
        $pubID = Publicacion::select('postID')->where('usuario', Auth::user()->id)->orderBy('postID', 'desc')->first()->postID;
        $publicacion->tag($tags);

         
          foreach ($request->precio as $i => $precio) {
            $detalle = new DetallePublicacion();
            $detalle->descripcion = $request->criterio[$i];
            $detalle->precio = $precio;
            $detalle->publicacion_servicio = $pubID;
            $detalle->save();
          } 



        
        $imagen = new Imagen();
        $imagen->nombre = $name;
        $imagen->publicacion()->associate($publicacion);
        $imagen->save();
        
//        Flash::sucess('Se ha creado la publicación' . $publicacion->titulo . ' de forma satisfactoria');

        return redirect()->route('detalle-servicio', ['postID' => $pubID, 'titulo' => $publicacion->titulo])->with('info', 'Post creado con éxito');
       
    }

    public function show($postID, $titulo)
    {

        $categoria = Publicacion::select('categoriaServ')->where('postID', $postID)->pluck('categoriaServ')->first();
        $up = Publicacion::select('usuario')->where('postID', $postID)->pluck('usuario')->first();
        $publicacion = Publicacion::where('postID', $postID)->first();
        $categorias = Categoria::where('categoriaID', $categoria)->first();
        $user = User::where('id', $up)->first();
        $imagen = Imagen::where('publicacion_id', $postID)->get();

        $detalle = DetallePublicacion::where('publicacion_servicio', $postID)->get();

        return view('publicaciones.ver', compact(['publicacion', 'imagen', 'user', 'categorias', 'detalle']));
    }

        public function showContact($postID, $titulo)
    {

        $categoria = Publicacion::select('categoriaServ')->where('postID', $postID)->pluck('categoriaServ')->first();
        $up = Publicacion::select('usuario')->where('postID', $postID)->pluck('usuario')->first();
        $publicacion = Publicacion::where('postID', $postID)->first();
        $categorias = Categoria::where('categoriaID', $categoria)->first();
        $user = User::where('id', $up)->first();
        $imagen = Imagen::where('publicacion_id', $postID)->get();

        $detalle = DetallePublicacion::where('publicacion_servicio', $postID)->get();

        return view('publicaciones.contacto', compact(['publicacion', 'imagen', 'user', 'categorias', 'detalle']));
    }
    
    public function prueba(){
        $publicacion = DB::table('publicacion')->first();
        $titulo = ucwords($publicacion->titulo);
        return $titulo;
        
//        $sql = "select * from publicacion, tagging_tagged where publicacion.postID = tagging_tagged.taggable_id and tagging_tagged.tag_name='Medicina'";
//        return DB::select($sql,array(1,20));
    }

     ///Servicio web buscador a tiempo real  
    public function busqueda(Request $request)
    {    
        ///
        $input = $request->all();  
        ///objeto publicacion sera igual a la  respuesta de cada ves que se digita       
            $publicaciones = Publicacion::titulo(strval($request->busqueda))
                ->get();        
        //return response()->utf8_encode($publicaciones);
        return response()->json($publicaciones);        
    }

     public function autocompletar(Request $request){

        $query = $request->get('titulo','');        

        $posts = Publicacion::where('titulo','LIKE','%'.$query.'%')->get();     

        return response()->json($posts);

    }
    
}
