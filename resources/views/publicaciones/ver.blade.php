@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/verservicio.css') }}">
@section('content')

<div class="col-sm-12 col-md-12 col-lg-12">
            <!-- product -->
            <div class="product-content product-wrap clearfix product-deatil">
                <div class="row">
                        <div class="col-md-5 col-sm-12 col-xs-12 ">
                            <div class="product-image"> 
                            <div id="myCarousel-2" class="carousel slide" data-ride="carousel">
                              <ol class="carousel-indicators">
                                @if (count($imagen) === 1)
                                <li data-target="#myCarousel-2" data-slide-to="0" class="active"></li>
                                @elseif (count($imagen) === 2)
                                <li data-target="#myCarousel-2" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel-2" data-slide-to="1"></li>
                                @elseif (count($imagen) === 3)
                                <li data-target="#myCarousel-2" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel-2" data-slide-to="1"></li>
                                <li data-target="#myCarousel-2" data-slide-to="2"></li>
                                @endif
                              </ol>
                              <div class="carousel-inner">
                                @foreach($imagen as $img)
                                <div class="carousel-item active">
                                  <img src="{{ asset('imagenes/publicaciones') }}/{{$img->nombre}}" width="400" alt="First slide" align="center">
                                </div>

                                @endforeach
                    
                              </div>
                              @if (count($imagen) === 1)
                              @elseif (count($imagen) > 1)
                              <a class="carousel-control-prev" href="#myCarousel-2" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Anterior</span>
                              </a>
                              <a class="carousel-control-next" href="#myCarousel-2" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Siguiente</span>
                              </a>
                              @endif
                              </div>
                            </div>
                            
                          
                        </div>
                        <div class="col-md-7 col-sm-12 col-xs-12">
                    
                        <h2 class="name">
                            {{ $publicacion->titulo }}
                            
                            <small>Posteado por: <a href="javascript:void(0);">{{ $user->usuario }}</a></small>
                            
                            <i class="fa fa-star fa-2x text-primary"></i>
                            <i class="fa fa-star fa-2x text-primary"></i>
                            <i class="fa fa-star fa-2x text-primary"></i>
                            <i class="fa fa-star fa-2x text-primary"></i>
                            <i class="fa fa-star fa-2x text-primary"></i>
                            <span class="fa fa-2x"><h5>(1) Valoraciones</h5></span>  
                            <a href="javascript:void(0);">(1) Opiniones</a>
                        </h2>
                        <hr>
                       <!-- <h3 class="price-container">
                            $129.54
                            <small>*includes tax</small>
                        </h3>-->
                        <div class="certified">
                            <ul>
                                <li><a href="javascript:void(0);">Categoría <span>{{ $categorias->descripcion }}</span></a></li>
                            </ul>
                        </div>
                        <hr>
                        <div class="description description-tabs">
                            <ul id="myTab" class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#more-information" data-toggle="tab" class="no-margin">Descripción </a></li>
                                <li class="nav-item"><a class="nav-link" href="#specifications" data-toggle="tab">Especificaciones</a></li>
                                <li class="nav-item"><a class="nav-link" href="#reviews" data-toggle="tab">Opiniones</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div class="tab-pane fade active in" id="more-information">
                                    <br>
                                    <strong>{{ $publicacion->titulo }}</strong>
                                    <p>{!! $publicacion->descripcion !!} </p>
                                </div>
                                <div class="tab-pane fade" id="specifications">
                                    <br>
                                    <dl class="">
                                            <dt>Incluye</dt>
                                            <dd>{{ $publicacion->incluye }}</dd>
                                            <br>

                                            <dt>No incluye</dt>
                                            <dd>{{ $publicacion->no_incluye }}</dd>
                                            <br>    

                                        </dl>
                                </div>
                                <div class="tab-pane fade" id="reviews">
                                    <br>
                                    <form method="post" class="well padding-bottom-10" onsubmit="return false;">
                                        <textarea rows="2" class="form-control" placeholder="Escribe una opinión"></textarea>
                                        <div class="margin-top-10">
                                            <button type="submit" class="btn btn-sm btn-primary pull-right">
                                                Agregar opinión
                                            </button>
                                            <a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="" data-original-title="Add Location"><i class="fa fa-location-arrow"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="" data-original-title="Add Voice"><i class="fa fa-microphone"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="" data-original-title="Add Photo"><i class="fa fa-camera"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="" data-original-title="Add File"><i class="fa fa-file"></i></a>
                                        </div>
                                    </form>

                                    <div class="chat-body no-padding profile-message">
                                        <ul>
                                            <li class="message">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="online">
                                                <span class="message-text"> 
                                                    <a href="javascript:void(0);" class="username">
                                                        Manuel Gonzalez 
                                                        <span class="badge">Adquirió servicio</span> 
                                                        <span class="pull-right">
                                                            <i class="fa fa-star fa-2x text-primary"></i>
                                                            <i class="fa fa-star fa-2x text-primary"></i>
                                                            <i class="fa fa-star fa-2x text-primary"></i>
                                                            <i class="fa fa-star fa-2x text-primary"></i>
                                                            <i class="fa fa-star fa-2x text-primary"></i>
                                                        </span>
                                                    </a> 
                                                    Puntualidad, calidad de trabajo y cumple con lo requerido. Excelente servicio.
                                                </span>
                                                <ul class="list-inline font-xs">
                                                    <li>
                                                        <a href="javascript:void(0);" class="text-info"><i class="fa fa-thumbs-up"></i> (2)</a>
                                                    </li>
                                                    <li class="pull-right">
                                                        <small class="text-muted pull-right ultra-light"> 21/06/2019 </small>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                    <a href="javascript:void(0);" class="btn btn-success btn-lg">Contratar servicio</a>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="btn-group pull-right">
                                    <button class="btn btn-white btn-default"><i class="fa fa-star"></i> Agregar a favoritos </button>
                                    <button class="btn btn-white btn-default"><i class="fa fa-envelope"></i> Contactar a Prestador</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end product -->
        </div>
@endsection