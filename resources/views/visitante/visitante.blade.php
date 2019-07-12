@extends('layouts.app')

@section('content')

<section class="post-area">
                <div class="container">
                    <div class="row justify-content-center d-flex">

                        <div class="col-lg-8 post-list">
                            @foreach($publicacion as $pub)
                            <div class="single-post d-flex flex-row">
                                <div class="thumb">
                                    <img src="{{ asset('imagenes/publicaciones') }}/{{$img->where('publicacion_id', $pub->postID)->pluck('nombre')->first()}}" height="108" width="108">
                                    <ul class="tags">
                                        @foreach($tags->where('taggable_id', $pub->postID) as $tag)
                                        <li>
                                            <a href="#">{{$tag->tag_name }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="details">
                                    <div class="title d-flex flex-row justify-content-between">
                                        <div class="titles">
                                            <a href="{{ route('detalle-servicio', ['postID' => $pub->postID, 'titulo' => $pub->titulo]) }}"><h4>{{ ucfirst(trans($pub->titulo)) }}</h4></a>
                                            <h6>{{ $categorias->where('categoriaID', $pub->categoriaServ)->pluck('descripcion')->first() }} </h6>                 
                                        </div>
                                        <ul class="btns">
                                            <li><a href="#"><span class="lnr lnr-heart"></span></a></li>
                                            <li><a href="{{ route('detalle-servicio', ['postID' => $pub->postID, 'titulo' => $pub->titulo]) }}">Ver publicación</a></li>
                                        </ul>
                                    </div>
                                    <p>
                                        {!!nl2br(str_limit(str_replace(" ", " &nbsp;", $pub->descripcion), 250))!!}<a href="{{ route('detalle-servicio', ['postID' => $pub->postID, 'titulo' => $pub->titulo]) }}" class="text-primary"><em> Leer post completo</em></a>
                                    </p>
                                    <p class="address"><span class="lnr lnr-map"></span> <strong>Publicado por: </strong>{{$users->where('id', $pub->usuario)->pluck('usuario')->first()}}</p>
                                    <p class="address"><span class="lnr lnr-database"></span><strong>Creado el: </strong>{{$pub->created_at}}</p>
                                </div>
                            </div>
                            @endforeach 
                            {!! $publicacion->render() !!}
                        </div>


                        <div class="col-lg-4 sidebar">
                            <div class="single-slidebar">
                                <h4>Servicios por Estado</h4>
                                <ul class="cat-list">
                                    @foreach($estados as $estado)
                                    <li><a class="justify-content-between d-flex" href="category.html"><p>{{ $estado->estado }}</p><span></span></a></li>
                                    @endforeach
                                </ul>
                            </div>
                      

                            <div class="single-slidebar">
                                <h4>Servicios por Categoria</h4>
                                <ul class="cat-list">
                                    @foreach($categorias as $categoria)
                                    <li><a class="justify-content-between d-flex" href="category.html"><p>{{    $categoria->descripcion    }}</p><span></span></a></li>
                                    @endforeach
                                </ul>
                            </div>                       

                        </div>
                    </div>
                </div>  
            </section>
            <!-- End post Area -->

@endsection
