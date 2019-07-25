@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Volver</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bg-primary text-white"><i class="fa fa-envelope"></i> Contactar a prestador de servicio
                </div>
                <div class="card-body">

                        <div class="form-group">
                            <h4><div class="text-info">Nombre del prestador: </div>{{ $user->nombre .' '.$user->paterno .' '.$user->materno }}</h4>
                        </div>
                        <div class="form-group">
                            <h4><div class="text-info">Télefono: </div>{{ $publicacion->tel_contacto }}</h4>
                        </div>

                        <div class="form-group">
                            <h4><div class="text-info">Whatsapp: </div>{{ $publicacion->tel_wsp }}</h4>
                        </div>

                        <div class="form-group">
                            <h4><div class="text-info">Correo electrónico: </div>{{ $user->email }}</h4>
                        </div>

                        <div class="form-group">
                            <div class="float-right">
                            <a href="/inicio" class="btn btn-danger ">Volver</a>
                            <a href="" class="btn btn-success">Conctactar al Prestador</a>
                        </div>
                        </div>


                </div>
            </div>
        </div>
        <div class="col-12 col-sm-4">
            <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase"><i class="fa fa-home"></i> Información servicio</div>
                <div class="card-body">
                    <p class="text-white">Título: {{ $publicacion->titulo }}</p>
                    <p class="text-white">Por: {{ $user->usuario }}</p>
                    <p class="text-white">Categoría: {{ ucwords($categorias->descripcion) }}</p>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection