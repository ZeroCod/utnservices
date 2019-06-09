<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sepomex;
use DB;
use App\User;
use Hash;
use Validator;
use App\Experiencia;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function perfil()
    {
//        $experiencia = Experiencia::where('id', Auth::user()->id)->first();
        
//        $experiencias  = "select * from experiencia_usuario e, categoria_servicios c where e.categoria = c.categoriaID";
//        $experiencia=DB::select($experiencias,array(1,20));
        
        $experiencia = DB::table('experiencia_usuario')
            ->join('categoria_servicios', 'experiencia_usuario.categoria', '=', 'categoria_servicios.categoriaID')
            ->get();
        
        $direc = Sepomex::select('estado', 'municipio', 'asentamiento')
                ->where('id', Auth::user()->sepoID)->get();
        
        return view('usuario.perfil', compact('experiencia', 'direc'));
    }
    
    public function actualizarPerfil()
    {
        $estados = DB::table('sepomex')
                ->groupBy('estado')
                ->get();
        
        $direc = Sepomex::select('estado', 'municipio', 'asentamiento')
                ->where('id', Auth::user()->sepoID)->first();
        
        return view('usuario.actualizar')
                ->with('estados', $estados)
                ->with('direc', $direc);
    }
    
    function fetch(Request $request)
    {
        
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('sepomex')
          ->where($select, $value)
          ->groupBy($dependent)
          ->get();
        $output = '<option value="">Seleccione '.ucfirst($dependent).'</option>';
        foreach($data as $row)
        {
         $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
        }
        echo $output;
    
    }
    
    public function actualizarInfoPersonal(Request $request)
    {
        $rules = [
                'nombre' => 'required|string|max:50',
                'paterno' => 'required|string|max:50',
                'materno' => 'max:50',
                'telefono' => 'max:10',
            ];
            
        $messages = [
            'nombre.required' => 'El nombre es requerido',
            'paterno.required' => 'El apellido paterno es requerido',
            ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect('/usuario/actualizar')->withErrors($validator);
        }
        else{
        
        $nombre = ucwords($request->nombre);
        $paterno = ucwords($request->paterno);
        $materno = ucwords($request->materno);
        $telefono = $request->telefono;
        $estado = $request->estado;
        $municipio = $request->municipio;
        $asentamiento = $request->asentamiento;
        $direccion = Sepomex::select('id')->where('estado', $estado)->where('municipio', $municipio)->where('asentamiento'
, $asentamiento)->first();
        
        $sepo;
        if($direccion == NULL){
            $sepo = null;
        }else{
            $sepo = $direccion->id;
        }
        
        
        User::where('id', Auth::user()->id)
                ->update(['nombre' => $nombre,
                        'paterno' => $paterno,
                        'materno' => $materno,
                        'telefono' => $telefono,
                        'sepoID' => $sepo]);
        
        return redirect("/usuario/actualizar")->with('status', 'Informacion actualizada con éxito');;
        
        }
    }
    
    public function configuracionCuenta(){
        
        return view('usuario.configuracion');
    }
    
    public function cambiarEmail(Request $request)
    {
        $rules = [
                'email' => 'required|string|email|max:255|unique:users',
            ];
            
        $messages = [
            'email.required' => 'El email es requerido',
            'email.unique' => 'El email ingresado ya existe',
            ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect('/usuario/configuracion')->withErrors($validator);
        }
        else{
            $email = $request->email;
                User::where('id', Auth::user()->id)
                ->update(['email' => $email,
                        ]);
                return redirect('/usuario/configuracion')->with('status', 'Email actualizado con éxito');
        }    

    }
    
    public function cambiarPassword(Request $request){
       
            $rules = [
                'mypassword' => 'required',
                'password'=> 'required|confirmed|min:6|max:18',
            ];
            
            $messages = [
                'mypassword.required' => 'El campo es requerido',
                'password.required' => 'El campo es requerido',
                'password.confirmed' => 'Los passwords no coinciden',
                'password.min' => 'El mínimo permitido son 6 caracteres',
                'password.max' => 'El máximo permitido son 18 caracteres',
                ];
            
        
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect('/usuario/configuracion')->withErrors($validator);
        }
        else{
            if (Hash::check($request->mypassword, Auth::user()->password)){
                $user = new User;
                $user->where('email', '=', Auth::user()->email)
                     ->update(['password' => bcrypt($request->password)]);
                return redirect('/usuario/configuracion')->with('status', 'Password cambiado con éxito');
            }
            else
            {
                return redirect('/usuario/configuracion')->with('message', 'Las contraseñas no conciden');
            }
        }
    }
}
