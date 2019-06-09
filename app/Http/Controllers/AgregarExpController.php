<?php

namespace App\Http\Controllers;
use App\Categoria;
use App\Experiencia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AgregarExpController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function experiencia()
    {
        $categorias = Categoria::orderBy('descripcion', 'ASC')->get();
        
        return view('usuario.experiencia')->with('categorias', $categorias);
    }
    
    public function guardar(Request $request)
    {
        $rules = [
                'categoria' => 'required',
                'detalle' => 'required|string|min:20',
                
            ];
            
        $experiencia = new Experiencia();
        
        $experiencia->categoria = $request->categoria;
        $experiencia->detalle = $request->detalle;
        $experiencia->usuario = Auth::user()->id;
        $experiencia->save();
            
        
        return redirect('/usuario/perfil')->with('info', 'Experiencia agregada');
    }
}
