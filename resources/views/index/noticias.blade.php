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
				          <li><a href="/">Noticias</a></li>
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
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Canal: Reforma				
							</h1>	
							<p class="text-white link-nav">Las últimas noticias publicadas más relevantes</p>
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->	
			
			<!-- Start blog-posts Area -->
			<section class="blog-posts-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 post-list blog-post-list">
							@foreach ($xmlContent->channel->item as $item)
							<div class="single-post">
								<img class="img-fluid" src="{{ $item->enclosure }}" alt="">
								<a href="{{ $item->link }}">
									<h1>
										{{ $item->title }}
									</h1>
								</a>
									<p>
										{{ $item->description }}
									</p>
								<div class="bottom-meta">
									<div class="user-details row align-items-center">
										<div class="comment-wrap col-lg-6">
											<ul>
												<li><a href="#"><span class="lnr lnr-calendar-full"></span> {{ $item->pubDate }} </a></li>
											</ul>
										</div>
										<div class="social-wrap col-lg-6">
											<ul>
												<li><i class="lnr lnr-user">{{ $item->author }}</i></li>
											</ul>
											
										</div>
									</div>
								</div>
							</div>
							@endforeach																					
						</div>
							
							<div class="single-widget recent-posts-widget">
								<h4 class="title">Noticias recientes</h4>
								<div class="blog-list ">
									@foreach ($xmlContent->channel->item as $item)
									<div class="single-recent-post d-flex flex-row">
										<div class="recent-thumb">
											<img class="img-fluid" src="{{ $item->enclosure }}" width="100">
										</div>
										<div class="recent-details">
											<a href="{{ $item->link }}">
												<h4>
													{{ $item->title }}
												</h4>
											</a>
											<p>
												{{ $item->pubDate }}
											</p>
										</div>
									</div>
									@endforeach
																										
								</div>								
							</div>
						</div>
					</div>
			</section>
			<!-- End blog-posts Area -->
			
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



