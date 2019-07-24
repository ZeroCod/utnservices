@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-3 ">
            <div class="list-group ">
                <a href="{{ route('actualizarInformacion') }}" class="list-group-item list-group-item-action">Información básica</a>
                <a href="{{ route('configuracion') }}" class="list-group-item list-group-item-action">Configuración de cuenta</a>
                <a href="{{ route('experiencia') }}" class="list-group-item list-group-item-action">Experiencia</a>
                <a href="{{ route('mis-servicios') }}" class="list-group-item list-group-item-action active">Mis servicios</a>
            </div> 
        </div>
        <div class="col-md-7">
        	@if (count($publicaciones) === 0)
        	<div class="card border-danger mb-3" style="max-width: 40rem;">
			  <div class="card-header text-danger"><strong>¡Sin servicios publicados!</strong></div>
			  <div class="card-body">
			    <p class="card-text">¿Es bueno en algo y desea generar un ingreso extra? Publique un nuevo servicio <a href="{{ route('nuevo-servicio') }}">aquí</a></p>
			  </div>
			</div>
			@endif
        	@foreach($publicaciones as $pub)
        	<div class="card border-secondary mb-3" style="max-width: 40rem;">
			  <div class="card-header">{{ $pub->categoriaServ }}</div>
			  <div class="card-body">
			    <h4 class="card-title text-info">{{ $pub->titulo }}</h4>
			    <p class="card-text">{!! nl2br(str_limit(str_replace(" ", " &nbsp;", $pub->descripcion), 200)) !!}</p>
			    <div class="offset-6 col-8">
			    <button class="btn btn-danger">Eliminar servicio</button>
				<button class="btn btn-primary">Editar servicio</button>
				</div>
			  </div>
			</div>
			
			
			@endforeach
        </div>
        

@endsection
