@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-3 ">
            <div class="list-group ">
                <a href="{{ route('actualizarInformacion') }}" class="list-group-item list-group-item-action">Información básica</a>
                <a href="{{ route('configuracion') }}" class="list-group-item list-group-item-action active">Configuración de cuenta</a>
                <a href="{{ route('experiencia') }}" class="list-group-item list-group-item-action">Experiencia</a>


            </div> 
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Configuración de la cuenta</h4>
                            <hr>
                            @if (Session::has('message'))
                                <div class="alert alert-dismissible alert-danger">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{Session::get('message')}}
                                </div>
                            @endif
                            @if (Session::has('status'))
                            
                            <div class='alert  alert-dismissible alert-primary'>
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{Session::get('status')}}
                            </div>
                           
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" action="{{ route('cambiar-email') }}">
                                
                                <div class="form-group row">
                                    <label for="username" class="col-4 col-form-label">Usuario</label> 
                                    <div class="col-3">
                                        <input id="usuario" name="usuario" placeholder="{{Auth::user()->usuario}}" class="form-control here" type="text" disabled>
                                        
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="email" class="col-4 col-form-label">Email</label> 
                                    <div class="col-8">
                                        <input id="email" name="email" class="form-control here" type="text" value="{{Auth::user()->email}}" required> 
                                        <div class="text-danger">{{$errors->first('email')}}</div>
                                    </div>
                                </div>
                                
                                {{ csrf_field() }}      
                                <input type="hidden" name="_method" value="PUT">

                                <div class="form-group row">
                                    <div class="offset-4 col-8">
                                        <button name="submit" type="submit" class="btn btn-primary">Cambiar email</button>
                                    </div>
                                </div>
                            </form>
                            <form method="POST" action="{{ route('cambiar-password') }}">    
                                <div class="col-md-12">
                                    <br>
                                    <p class="text-primary"><b>Cambiar contraseña</b></p>
                                    <hr>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="mypassword" class="col-4 col-form-label">Contraseña actual</label> 
                                    <div class="col-8">
                                        <input id="mypassword" name="mypassword" class="form-control here" type="password">
                                        <div class="text-danger">{{$errors->first('mypassword')}}</div>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="password" class="col-4 col-form-label">Nueva contraseña</label> 
                                    <div class="col-8">
                                        <input id="password" name="password" class="form-control here" type="password">
                                        <div class="text-danger">{{$errors->first('password')}}</div>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="password_confirmation" class="col-4 col-form-label">Repita nueva contraseña</label> 
                                    <div class="col-8">
                                        <input id="password_confirmation" name="password_confirmation" class="form-control here" type="password"> 
                                    </div>
                                </div>
       

                                {{ csrf_field() }}      
                                <input type="hidden" name="_method" value="PUT">

                                <div class="form-group row">
                                    <div class="offset-4 col-8">
                                        <button name="submit" type="submit" class="btn btn-primary">Cambiar contraseña</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
