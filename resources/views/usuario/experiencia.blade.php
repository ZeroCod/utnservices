@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-3 ">
            <div class="list-group ">
                <a href="{{ route('actualizarInformacion') }}" class="list-group-item list-group-item-action">Información básica</a>
                <a href="{{ route('configuracion') }}" class="list-group-item list-group-item-action">Configuración de cuenta</a>
                <a href="{{ route('experiencia') }}" class="list-group-item list-group-item-action active">Experiencia</a>
                <a href="{{ route('mis-servicios') }}" class="list-group-item list-group-item-action">Mis servicios</a>


            </div> 
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Agregar experiencia</h4>
                            <hr>
                            <div class="alert alert-dismissible alert-secondary">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Importante: </strong>En este apartado deberás elegir una categoría en la cuál tengas experiencia, y en la parte de descripción agregarás todos los detalles sobre tu experiencia en la misma.
                                <br>
                            </div>
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
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" action="{{ route('guardar-experiencia') }}">
                                
                                <div class="form-group row">
                                    <label for="categoria" class="col-4 col-form-label">Categoría</label> 
                                    <div class="col-8">
                                        <select input id="categoria" name="categoria" class="form-control list-group" required>
                                            
                                            
                                            @foreach ($categorias as $categoria)
                                          
                                            <option value="{{ $categoria->categoriaID }}">{{ $categoria->descripcion }}</option>
                                            
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="detalle" class="col-4 col-form-label">Descripcion</label>
                                    <div class="col-8">
                                     <textarea type="detalle" name="detalle" id="detalle" class="form-control" rows="3" required></textarea>
                                    </div>
                                </div>
                                {{ csrf_field() }}
                               

                                <div class="form-group row">
                                    <div class="offset-4 col-8">
                                        <button name="submit" type="submit" class="btn btn-primary">Guardar</button>
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
