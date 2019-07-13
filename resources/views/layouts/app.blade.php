<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ServicesUTN</title>
    <link rel="shortcut icon" href="{{ asset('img/fav.png') }}">


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-tagsinput.min.js') }}"></script>
    <!-- Generamos el script para poder obtener cada digitacion-->
   <script>  
        // A $( document ).ready() block.
        /*Creamos la funcion para obtener la digitacion
          @Roberto Boz*/
        $( document ).ready(function() {
            /*La funcion keyup, indica que cuando digitas y levantas el 
              dedo del teclado se guardara esa digitacion en una variable
              la variable se guardara en en search y se mandara a la ruta donde 
              genere el servicio web @Roberto Boz*/
            $('#buscador').on('keyup', function(){
                var  search =  document.getElementById("buscador").value;
                var token = $('meta[name="csrf-token"]').attr('content');                         
                $.ajax
                ({                    
                    type:'post',
                    url:'/publicaciones/busqueda',
                    data:{'busqueda':search, _token : token },            
                    success: function(res){                         
                       console.log(res); 
                       /*Inicialiso mi variable que contiene las div @Roberto Boz */
                        var newhtml = '';  
                        /*Un for que recorra la variable res para postear los resultados @Roberto Boz*/                              
                        for(var i in res) {
                            console.log(i, res[i]);
                            newhtml +='<div class="single-post d-flex flex-row"><div class="thumb"><img src="imagenes/publicaciones/servicesutn_1560753970.jpeg" height="108" width="108"><ul class="tags"><li><a href="#">'+res[i].titulo+'</a></li></ul></div><div class="details"><div class="title d-flex flex-row justify-content-between"><div class="titles"><a href="single.html"><h4>'+res[i].titulo+'</h4></a><h6>'+res[i].categoriaServ+'</h6></div><ul class="btns"><li><a href="#"><span class="lnr lnr-heart"></span></a></li> <li><a href="#">Ver publicación</a></li></ul></div><p>'+res[i].descripcion+'<a href="" class="text-primary"><em> Leer post completo</em></a></p><p class="address"><span class="lnr lnr-map"></span> <strong>Publicado por: </strong>Roberto Boz</p><p class="address"><span class="lnr lnr-database"></span><strong>Creado el: </strong>'+res[i].created_at+'</p></div></div></div>';
                           
                        }
                        if(newhtml===''){
                            newhtml='<div class="card text-white bg-danger mb-2" style="max-width: 40em;"><div class="card-header">Sin servicios!</div><div class="card-body"><h4 class="card-title">Lo sentimos!</h4><p class="card-text">No hay servicios que cumplan con su criterio de búsqueda</p></div></div>';
                        }
                        
                        document.getElementById('postlist').innerHTML='';
                        document.getElementById('postlist').innerHTML=newhtml;

                    }
                })
            });
        });

                $(window).on('load', function () {
              setTimeout(function () {
            $(".loader-page").css({visibility:"hidden",opacity:"0"})
          }, 100);
             
        });

   </script>
   <style type="text/css">  .loader-page {
    position: fixed;
    z-index: 25000;
    background: rgb(255, 255, 255);
    left: 0px;
    top: 0px;
    height: 100%;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition:all .3s ease;
  }
  .loader-page::before {
    content: "";
    position: absolute;
    border: 2px solid rgb(50, 150, 176);
    width: 60px;
    height: 60px;
    border-radius: 50%;
    box-sizing: border-box;
    border-left: 2px solid rgba(50, 150, 176,0);
    border-top: 2px solid rgba(50, 150, 176,0);
    animation: rotarload 1s linear infinite;
    transform: rotate(0deg);
  }
  @keyframes rotarload {
      0%   {transform: rotate(0deg)}
      100% {transform: rotate(360deg)}
  }
  .loader-page::after {
    content: "";
    position: absolute;
    border: 2px solid rgba(50, 150, 176,.5);
    width: 60px;
    height: 60px;
    border-radius: 50%;
    box-sizing: border-box;
    border-left: 2px solid rgba(50, 150, 176, 0);
    border-top: 2px solid rgba(50, 150, 176, 0);
    animation: rotarload 1s ease-out infinite;
    transform: rotate(0deg);
  }</style>

   

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">					
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bs.min.css') }}">

    
    
    
</head>

<body>
    <div class="loader-page"></div>

    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-light navbar-laravel">
            <div class="container" id="navbarColor02">
                
                <a class="navbar-brand" href="{{ url('/inicio') }}">
                    <img src="{{ asset('img/SF_Inicio.png') }}" alt="" height="45px" title="" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>
                    @guest
                    <form class="form-inline my-2 my-lg-0 col-md-5 col-md-offset-4" method="GET" action="{{ route('inicio') }}">

                        <div class="input-group mb-1 ">
                          <input type="search" class="form-control" placeholder="Buscar servicios" aria-label="Buscar servicios" aria-describedby="basic-addon2" id="buscador" name="titulo">
                          <div class="input-group-append">
                            <button class="genric-btn success medium btn-outline-secondary" type="submit">Buscar</button>
                          </div>
                        </div>
                    </form>
                    @else
                    <form class="form-inline my-2 my-lg-0 col-md-5 col-md-offset-4" method="GET" action="{{ route('inicio') }}">

                        <div class="input-group mb-1 ">
                          <input type="search" class="form-control" placeholder="Buscar servicios" aria-label="Buscar servicios" aria-describedby="basic-addon2" id="buscador" name="titulo">
                          <div class="input-group-append">
                            <button class="genric-btn success medium btn-outline-secondary" type="submit">Buscar</button>
                          </div>
                        </div>
                    </form>
                    @endguest
                    <!-- Lado derecho navegación -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Enlaces de autenticación -->
                        @guest
                            <li class="nav-item nav-menu">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item nav-menu">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                </li>
                            @endif
                        @else
                        
                        <input type="button" class="btn btn-success active" value="Nuevo servicio" onclick="window.location='{{ route("nuevo-servicio") }}'">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle nav-menu" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" v-pre>
                                    {{ 'Bienvenid@' . ' ' . Auth::user()->nombre }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('perfil') }}">
                                        {{ __('Perfil') }}
                                    </a>
                                    
                                    <a class="dropdown-item" href="{{ route('actualizarInformacion') }}">
                                        {{ __('Actualizar información') }}
                                    </a>
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                                
                                
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
 
</body>
</html>
