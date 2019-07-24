@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="asset('css/asd.css') }}">
@if (Session::has('message'))
                                <div class="alert alert-dismissible alert-danger">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{Session::get('message')}}
                                </div>
                            @endif
                            @if (Session::has('info'))
                            
                            <div class='alert  alert-dismissible alert-primary'>
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{Session::get('info')}}
                            </div>
                           
                            @endif
<div class="container emp-profile">
            <form >
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="{{ asset('img/user.png') }}" width="200" height="200" alt="{{ Auth::user()->usuario }}"/>
<!--                            <div class="file btn btn-primary">
                                
                                <input type="file" name="file"/>
                            </div>-->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        {{Auth::user()->nombre.' '.Auth::user()->paterno}}
                                    </h5>
                                    <h6>
                                        
                                    </h6>
                                    <p class="proile-rating">Calificación: <span>8/10</span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Acerca de</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Experiencia</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a class="nav-link " href="{{ route('actualizarInformacion') }}">Editar perfil</a>
                       
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <br>
<!--                        <div class="profile-work card text-white bg-primary mb-3" style="max-width: 18rem;">
                            <p>Acerca de mí</p>
                            <p>Prueba</p>
                            <p>Registrado el: {{ Auth::user()->created_at }}</p>
                       
                        </div>-->
                        <div class="card border-primary mb-2" style="max-width: 17rem;">
                            <div class="card-header"><strong>{{'@'.Auth::user()->usuario}}</strong></div>
                            <div class="card-body">
                              <h5 class="card-title text-primary">Acerca de mí</h5>
                              <p class="card-text">Nada</p>
                              <hr>
                              <h5 class="card-title text-primary">Creado el</h5>
                              <p class="card-text">{{Auth::user()->created_at}}</p>
                            </div>
                          </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label><strong class="text-primary">Usuario</strong></label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{Auth::user()->usuario}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label><strong class="text-primary">Nombre</strong></label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{Auth::user()->nombre.' '.Auth::user()->paterno}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label><strong class="text-primary">Email</strong></label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{Auth::user()->email}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label><strong class="text-primary">Telefono</strong></label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{Auth::user()->telefono}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            @forelse($direc as $dir)
                                                <div class="col-md-6">
                                                    <label><strong class="text-primary">Ubicación</strong></label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>{{$dir->estado. ', '.$dir->municipio. ', '.$dir->asentamiento }}</p>
                                                </div>
                                            @empty
                                                <div class="col-md-6">
                                                    <label><strong class="text-primary">Sin ubicación registrada</strong></label>
                                                </div>
                                            @endforelse
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                
                                @forelse ($experiencia->where('usuario', Auth::user()->id) as $exp)
                                    
                                    <div class="row">
                                            <div class="col-md-6">
                                                <label><strong class="text-primary">Categoría</strong></label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{   $exp->descripcion   }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label><strong class="text-primary">Descripción</strong></label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{!!nl2br(str_replace(" ", " &nbsp;", $exp->detalle))!!}</p>
                                            </div>
                                        </div>
                                @empty
                                    <div class="row">
                                            <div class="col-md-6 alert-secondary">
                                                <label><strong class="text-primary">Sin experiencia registrada</strong></label>
                                            </div>
                                           
                                        </div>
                                @endforelse
                                        
                         
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
@endsection