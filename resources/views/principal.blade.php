	<!DOCTYPE html>
	<html lang="es" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>ServicesUTN | Inicio</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">					
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/main.css">
		</head>
		<body>

			  <header id="header" id="home">
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="/"><img src="img/x.png" alt="" title="" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="/">Inicio</a></li>
				          <li><a href="/">Acerca de</a></li>
				          <li><a href="/">Categorías</a></li>
				    
				         
				          <li><a href="/">Contacto</a></li>
				          <li><a href="{{ route('inicio') }}">Buscar Servicios</a></li>
				            
				          </li>
                                          
                                          @if(Route::has('login'))
                                          
                                            @auth
                                            <li><a class="ticker-btn" href="{{ route('perfil') }}">Mi perfil</a></li>
                                            @else
				          <li><a class="ticker-btn" href="{{ route('register') }}">Registrarse</a></li>
				          <li><a class="ticker-btn" href="{{ route('login') }}">Ingresar</a></li>	
                                            @endauth
                                           @endif
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header><!-- #header -->


			<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-center">
						<div class="banner-content col-lg-12">
							<h1 class="text-white">
								<span>{{ $publicaciones }}+</span> Servicios posteados				
							</h1>	
							<form @guest action="{{ route('inicio') }}" @else action="{{ route('inicio') }}" @endguest class="serach-form-area">
								<div class="row justify-content-center form-wrap">
									<div class="col-lg-4 form-cols">
										<input type="text" class="form-control" name="titulo" placeholder="¿Qué servicio necesita?">
									</div>
									<div class="col-lg-3 form-cols">
										<div class="default-select" id="default-selects"">
											<select>
												<option value="">Seleccionar Estado</option>
											  @foreach($sepomex as $sepo)
                                                  	<option value="{{ $sepo->idEstado }}">	{{ $sepo->estado }}</option>
                                              @endforeach
											</select>
										</div>
									</div>
									<div class="col-lg-3 form-cols">
										<div class="default-select" id="default-selects2">
											<select>
												<option value="1">Todas las categorías</option>
												@foreach($categorias as $categoria)
                                                    <option value="{{ $categoria->categoriaID }}">{{ $categoria->descripcion }}</option>
                                                @endforeach
											</select>
										</div>										
									</div>
									<div class="col-lg-2 form-cols">
									    <button type="submit" class="btn btn-info">
									      <span class="lnr lnr-magnifier"></span> Buscar
									    </button>
									</div>								
								</div>
							</form>	
							<p class="text-white"> <span>Buscar por etiquetas:</span> Tecnología, Salud, Herrería, Construcción, Diseño</p>
						</div>											
					</div>
				</div>
			</section>
<!--			 End banner Area 	

			 Start features Area -->
			<section class="features-area">
				<div class="container">
					<div class="row">
						
						<div class="col-lg-6 col-md-10">
							<div class="single-feature">
								<h4>¿Necesita algún servicio?</h4>
								<p>
									Busque las diferentes alternativas que el sitio le ofrece, y elija la que se adapte mejor a sus necesidades
								</p>
							</div>
						</div>
						<div class="col-lg-6 col-md-10">
							<div class="single-feature">
								<h4>¿Eres bueno en algo?</h4>
								<p>
									Puedes publicar algún servicio que ofrezcas dentro de las distintas categorías que tenemos. 
								</p>
							</div>
						</div>
																							
					</div>
				</div>	
			</section>
<!--			 End features Area 
			
			 Start popular-post Area 
			<section class="popular-post-area pt-100">
				<div class="container">
					<div class="row align-items-center">
						<div class="active-popular-post-carusel">
							<div class="single-popular-post d-flex flex-row">
								<div class="thumb">
									<img class="img-fluid" src="img/p1.png" alt="">
									<a class="btns text-uppercase" href="#">view job post</a>
								</div>
								<div class="details">
									<a href="#"><h4>Creative Designer</h4></a>
									<h6>Los Angeles</h6>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis.
									</p>
								</div>
							</div>	
							<div class="single-popular-post d-flex flex-row">
								<div class="thumb">
									<img src="img/p2.png" alt="">
									<a class="btns text-uppercase" href="#">view job post</a>
								</div>
								<div class="details">
									<a href="#"><h4>Creative Designer</h4></a>
									<h6>Los Angeles</h6>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis.
									</p>
								</div>
							</div>
							<div class="single-popular-post d-flex flex-row">
								<div class="thumb">
									<img src="img/p1.png" alt="">
									<a class="btns text-uppercase" href="#">view job post</a>
								</div>
								<div class="details">
									<a href="#"><h4>Creative Designer</h4></a>
									<h6>Los Angeles</h6>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis.
									</p>
								</div>
							</div>	
							<div class="single-popular-post d-flex flex-row">
								<div class="thumb">
									<img src="img/p2.png" alt="">
									<a class="btns text-uppercase" href="#">view job post</a>
								</div>
								<div class="details">
									<a href="#"><h4>Creative Designer</h4></a>
									<h6>Los Angeles</h6>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis.
									</p>
								</div>
							</div>	
							<div class="single-popular-post d-flex flex-row">
								<div class="thumb">
									<img src="img/p1.png" alt="">
									<a class="btns text-uppercase" href="#">view job post</a>
								</div>
								<div class="details">
									<a href="#"><h4>Creative Designer</h4></a>
									<h6>Los Angeles</h6>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis.
									</p>
								</div>
							</div>	
							<div class="single-popular-post d-flex flex-row">
								<div class="thumb">
									<img src="img/p2.png" alt="">
									<a class="btns text-uppercase" href="#">view job post</a>
								</div>
								<div class="details">
									<a href="#"><h4>Creative Designer</h4></a>
									<h6>Los Angeles</h6>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis.
									</p>
								</div>
							</div>																																							
						</div>
					</div>
				</div>	
			</section>
			 End popular-post Area -->
			
			<!-- Start feature-cat Area -->
			<section class="feature-cat-area pt-100" id="category">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-10">
							<div class="title text-center">
								<h1 class="mb-10">Categorías de servicio destacados</h1>
								<p>¿Qué es lo que más se requiere?</p>
							</div>
						</div>
					</div>						
					<div class="row">
						<div class="col-lg-2 col-md-4 col-sm-6">
							<div class="single-fcat">
								<a href="category.html">
									<img src="img/o1.png" alt="">
								</a>
								<p>Seguridad informática</p>
							</div>
						</div>
						<div class="col-lg-2 col-md-4 col-sm-6">
							<div class="single-fcat">
								<a href="category.html">
									<img src="img/o2.png" alt="">
								</a>
								<p>Diseño</p>
							</div>
						</div>
						<div class="col-lg-2 col-md-4 col-sm-6">
							<div class="single-fcat">
								<a href="category.html">
									<img src="img/o3.png" alt="">
								</a>
								<p>Tecnología</p>
							</div>
						</div>
						<div class="col-lg-2 col-md-4 col-sm-6">
							<div class="single-fcat">
								<a href="category.html">
									<img src="img/o4.png" alt="">
								</a>
								<p>Oficina</p>
							</div>
						</div>
						<div class="col-lg-2 col-md-4 col-sm-6">
							<div class="single-fcat">
								<a href="category.html">
									<img src="img/o5.png" alt="">
								</a>
								<p>Salud</p>
							</div>
						</div>
						<div class="col-lg-2 col-md-4 col-sm-6">
							<div class="single-fcat">
								<a href="category.html">
									<img src="img/o6.png" alt="">
								</a>
								<p>Administración</p>
							</div>			
						</div>																											
					</div>
				</div>	
			</section>
			<!-- End feature-cat Area -->
			
			
				

			<!-- Start callto-action Area -->
			<section class="callto-action-area section-gap" id="join">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content col-lg-9">
							<div class="title text-center">
								<h1 class="mb-10 text-white">¡Únete ahora!</h1>
								<p class="text-white">Puedes contratar los servicios que requieras para tus necesidades y también publicar hasta 3 servicios que puedas ofrecer</p>
								<a class="primary-btn" href="{{ route('register') }}">Registrarse</a>
								<a class="primary-btn" href="#">Preguntas frecuentes</a>
							</div>
						</div>
					</div>	
				</div>	
			</section>
                        
			<!-- End calto-action Area -->

			
			<!-- inicio footer -->		
			<footer class="footer-area section-gap">
				<div class="container">

					<div class="row d-flex justify-content-between">
						<p class="col-lg-8 col-sm-12 footer-text m-0 text-white ">
							
                                                        <font size='4'>Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados | Creado por ServicesUTN y ZeroCode Lab <i class="fa fa-archive" aria-hidden="true"></i></font>
						</p>
						<div class="col-lg-4 col-sm-12 footer-social">
							<a href="http://facebook.com/yeyo0221"><i class="fa fa-facebook"></i></a>
							<a href="twitter.com/yeyo0221"><i class="fa fa-twitter"></i></a>
							<a href="instagram.com/yeyo0221"><i class="fa fa-instagram"></i></a>
							<a href="#"><i class="fa fa-whatsapp"></i></a>
						</div>
					</div>
				</div>
                            
			</footer>
			<!-- final footer -->		

			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>			
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="js/easing.min.js"></script>			
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>	
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>	
			<script src="js/owl.carousel.min.js"></script>			
			<script src="js/jquery.sticky.js"></script>
			<script src="js/jquery.nice-select.min.js"></script>			
			<script src="js/parallax.min.js"></script>		
			<script src="js/mail-script.js"></script>	
			<script src="js/main.js"></script>	
		</body>
	</html>



