<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!--<meta name="keywords" content="responsive, parallax, creative, comingsoon, bootstrap, html5 template, one page, landing page">-->
        <meta name="description" content="OocarpaRoutes - Un sitio para conocer Tegucigalpa en transporte público.">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" type="image/ico" href="./img/imagen.png" sizes="any" />
        <!-- Place favicon.ico in the root directory -->

        <link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto" rel="stylesheet">

        <!-- style sheets -->
        <link rel="stylesheet" href="{{asset('assets/vendor/css/bootstrap.css')}}">
        <!--<link rel="stylesheet" href="{{--asset('assets/css/fifty-one.css')--}}">-->
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
        <!--<link rel="stylesheet" href="{{--asset('assets/js/vegas/vegas.min.css')--}}">
        <link rel="stylesheet" href="{{--asset('assets/js/owl-carousel/owl.carousel.css')--}}">
        <link rel="stylesheet" href="{{--asset('assets/js/owl-carousel/owl.theme.css')--}}">-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.css')}}">
        <!-- color stylesheets -->
         <link rel="stylesheet" href="{{asset('assets/css/color-css/brown.css')}}">
         <link href="{{ asset('css/table.css') }}" rel="stylesheet">
        <!-- <link rel="stylesheet" href="assets/css/color-css/blue.css">
        <link rel="stylesheet" href="assets/css/color-css/red.css">
        <link rel="stylesheet" href="assets/css/color-css/green.css">
        <link rel="stylesheet" href="assets/css/color-css/indigo.css">
        <link rel="stylesheet" href="assets/css/color-css/pink.css"> -->
        <!-- style sheets ends here -->

        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Great+Vibes&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css"/>
        <link rel="stylesheet" type="text/css" href="{{asset('css/mapa_landing.css')}}">
        <!-- Leaflet Routing -->
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
        <link rel="stylesheet" href="{{asset('css/leaflet.contextmenu.css')}}"/>
        <link rel="stylesheet" href="{{asset('css/leaflet-number-icon.css')}}" />

        <script src="https://unpkg.com/leaflet@1.0.2/dist/leaflet.js"></script>
        <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
        <link rel="stylesheet" href="{{asset('fontawesome-free-5.7.1-web/css/all.css')}}" >
        <link href="{{asset('fontawesome-free-5.7.1-web/js/all.js')}}" >
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body class="play-animations" id="page-top" data-offset="50" data-spy="scroll" data-target=".navbar-fixed-top" style="overflow-x: hidden;">
        <!-- preloader -->
        <div class="se-pre-con"></div>
        <!-- preloader ends here -->

        <!-- Add your site or application content here -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" style="background-color: beige!important;" data-toggle="collapse" data-target="#navbar-example">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand"  href="{{route('landing')}}">
                        <span class="p_color" style="font-family: Pacifico, cursive; font-size:2.5rem;color: #038827;display: inline-flex;">Oocarpa
                        <span  class="p_color" style="font-family: Pacifico, cursive; font-size:2.5rem; color:#7f4600;display: inline-flex;">Routes</span>
                    </span>
                    </a>
                </div><!-- end nav bar header -->

                <div class="navbar-collapse collapse" id="navbar-example">
                    <ul class="nav navbar-right" style="display: inline-flex;">
                        <li><a class="page-scroll" href="{{route("login")}}">Iniciar sesión</a></li>
                        <li><a class="page-scroll" href="{{route("registro")}}">Registrarse</a></li>
                    </ul>
                </div>
            </div> <!-- end container -->
        </nav> <!-- end navigation bar -->

            <!--<div class="parallax-window" data-parallax="scroll" data-image-src="{{asset('img/logo-reducido.png')}}">
                <div class="overlay"></div>
                <div id="landing">
                    <div class="container">
                        <div class="row text-center">
                            <div class="col-md-8 col-md-offset-2">
                                <h1 id="heading">OocarpaRoutes</h1>
                                <p id="tagline">Conocer el transporte público nunca fue tan fácil.</p>
                            </div>
                            <div class="col-md-12 text-center landing-btns">
                            </div>
                        </div>
                    </div>
                </div>
            </div> end parallax window -->

            <header class="" id="home">
                <div class="container">
                    <p class="tagline">Conocer el transporte público nunca fue tan fácil</p>
                </div>
                <div class="img-holder mt-3 ml-auto mr-auto" style="width: 100vw;margin: 0%"><img src="{{asset('img/logo-reducido.png')}}" alt="phone" style="width:100%" class="img-emp" ></div>
                <h1>
                    <span class="p_color" style="font-family: Pacifico, cursive; color: #038827;display: inline-flex;">Oocarpa
                    <span  class="p_color" style="font-family: Pacifico, cursive; color:#7f4600;display: inline-flex;">Routes</span>
                </h1>
            </header>
            <!--------------------------Caracteristicas-------------------------->
            <div class="section light-bg" id="features">
                <div class="container">
                    <div class="section-title">
                        <small></small>
                        <h3>Características Imprescindibles</h3>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="card features">
                                <div class="card-body">
                                    <div class="media">
                                        <span class="fas fa-palette gradient-fill ti-2x mr-3"></span>
                                        <div class="media-body">
                                            <h4 class="card-title">Simple</h4>
                                            <p class="card-text">Un diseño sencillo e intuitivo. diseñado amigablemente para ti</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="card features">
                                <div class="card-body">
                                    <div class="media">
                                        <span class="fas fa-check gradient-fill ti-2x mr-3"></span>
                                        <div class="media-body">
                                            <h4 class="card-title">Efectivo</h4>
                                            <p class="card-text">Procuramos que no falte ninguna ruta y que no tengas problemas al usar la plataforma</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="card features">
                                <div class="card-body">
                                    <div class="media">
                                        <span class="fas fa-lock gradient-fill ti-2x mr-3"></span>
                                        <div class="media-body">
                                            <h4 class="card-title">Seguro</h4>
                                            <p class="card-text">Te brindamos seguridad y confidencialidad de tus datos</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-----------------------Fin Caracteristicas--------------------------->
            <!-----------------------pestañas---------------------->
            <!--<div class="section light-bg">
                <div class="container">
                    <div class="section-title">
                        <small>características</small>
                        <h3>Movilizate más con nuestro sistema</h3>
                    </div>

                    <ul class="nav nav-tabs nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#Descubre">Descubre</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#Crea">Crea</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#Comparte">Comparte</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="Descubre">
                            <div class="d-flex flex-column flex-lg-row">
                                <img src="img/cel2.png" alt="graphic" class="img-fluid rounded align-self-start mr-lg-5 mb-5 mb-lg-0">
                            <div>
                                <h2>Consulta la ruta que necesites</h2>
                                <p class="lead">No tendrás excusa para movilizarte por la ciudad</p>
                                <p>Nuestra intuitiva interfaz te ayudará a visualizar la ciudad de una mejor manera, Ver una ruta urbana nunca fue tan sencillo. Nuestro servicio de visualización te encantará
                                </p>
                            </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Crea">
                            <div class="d-flex flex-column flex-lg-row">
                                <div>
                                    <h2>Haz tus propias rutas</h2>
                                    <p class="lead">Crear una trayectoria personalizada siempre es necesario</p>
                                    <p>Sabemos que necesitas recordar esos atajos que alguna vez usaste. Crea tu próxima ruta ahora.
                                    </p>
                                </div>
                                <img src="img/cel2.png" alt="graphic" class="img-fluid rounded align-self-start mr-lg-5 mb-5 mb-lg-0">
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Comparte">
                            <div class="d-flex flex-column flex-lg-row">
                                <img src="img/cel2.png" alt="graphic" class="img-fluid rounded align-self-start mr-lg-5 mb-5 mb-lg-0">
                                <div>
                                    <h2>Comparte tus rutas</h2>
                                    <p class="lead">Proporcionamos un medio para facilitar la forma en que brindas tus direcciones</p>
                                    <p>Con el servicio de OocarpaRoutes podrás compartir esas rutas personales con otros.
                                    </p>
                                    <p>¿Preocupado por tu confidencialidad? No es momento de aflicción, la ruta solo la ve quién tu autorices.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>-->

            <!------------------Fin pestañas---------------------->

            <!--------------------------Pasos---------------------->
            <div class="section">

                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-lg-6 d-flex align-items-center">
                            <ul class="list-unstyled ui-steps">
                                <li class="media bg-light">
                                    <div class="circle-icon mr-4">1</div>
                                    <div class="media-body">
                                        <h5>Crea una Cuenta</h5>
                                        <p>Registrate en la App, es sencillo.
                                            No te tomará mucho tiempo.</p>
                                    </div>
                                </li>
                                <li class="media my-4 bg-light" >
                                    <div class="circle-icon mr-4">2</div>
                                    <div class="media-body">
                                        <h5>Disfruta de nuestros servicios</h5>
                                        <p>Consulta las rutas de transporte público, crea rutas personalizadas y obten información sitios del casco urbano.</p>
                                    </div>
                                </li>
                                <li class="media bg-light">
                                    <div class="circle-icon mr-4">3</div>
                                    <div class="media-body">
                                        <h5>Comparte</h5>
                                        <p>Muestra a los demás lo sencillo que es usar el sitio y los beneficios que trae.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4 col-sm-4 col-lg-4">
                            <img src="{{asset('img/laptop.png')}}" alt="iphone" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
            <!------------------------Fin Pasos-------------------->



           <div class="bg-light bordes section-background" id="list_rutas" data-parallax="scroll" data-image-src="assets/images/subscribe.jpg">
                <div class="container">
                    <div class="row subscribe-row">
                        <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                            <form role="form">
                                <div class="row text-center">
                                    <div class="col-md-9 col-sm-8 col-xs-12" ><form method="get">
                                        <div class="form-group">
                                            <input type="text" class="form-control" style="width: 100%" id="search-e" value="{{ isset($search) ? $search : ''}}" name="search" placeholder="Filtrar...">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12" >
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Buscar</button>
                                        </div> </form>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12" >
                                        <table class="table  table-striped table-hover" style="background-color: #ffffffa1">
                                            <tbody>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Tipo</th>
                                                    <th>Descripción</th>
                                                    <th>Acción</th>
                                                </tr>
                                            @foreach($routes as $route)
                                                <tr>
                                                    <td>{{$route->name}}</td>
                                                    <td>{{$route->RouteType["name"]}}</td>
                                                    <td>{{$route->description}}</td>
                                                    <td>
                                                        <a class="btn btn-outline-primary mr-2" href="{{ route('landing route show',$route->id)}}">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        {{$routes->links()}}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
           </div>
                <!-- usada para visualizar rutas-->
            @if(isset($ruta))
                <input type="text" style="display: none" value="{{json_encode($ruta->coordinates)}}" id="ruta">
            @endif

            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12"   style="display: contents;">
                <div style="background-image: url('{{ asset('img/banners/'.$banner) }}');background-repeat: no-repeat;background-size: 100% 60px; height: 60px;margin-top: -16px;margin-bottom: 10px">
                </div>
                <main class="main" >
                    <div >
                        <div id="mapid">
                            <button id="locate-position" class="colordefault" style="display: none"><i class="eye fas fa-globe-americas fa-lg"></i></button>
                        </div>
                    </div>
                </main>
            </div>

            <!------------------------Uso de app------------------------>
            <div class="section bg-gradient col-md-12 col-lg-12 col-sm-12" id="Descargar">
                <div class="container">
                    <div class="call-to-action">
                        <div>
                            <span class="box-icon"><i class="fas fa-laptop fa-lg gradient-fill "></i></span>&nbsp; &nbsp; &nbsp;
                            <span class="box-icon"><i class="fa fa-desktop fa-lg gradient-fill "></i></span>&nbsp; &nbsp; &nbsp;
                            <span class="box-icon"><i class="fas fa-tablet-alt fa-lg gradient-fill "></i></span>&nbsp; &nbsp; &nbsp;
                            <span class="box-icon"><i class="fas fa-mobile-alt fa-lg gradient-fill "></i></span>&nbsp; &nbsp; &nbsp;
                        </div>
                        <h2>Usa nuestros servicios en cualquier dispositivo</h2>
                        <p class="tagline">Web disponible en cualquier plataforma.</p>
                    </div>
                </div>

            </div>
            <!------------------------Fin uso de app------------------------>

            <!------------------------------Contactanos--------------------->
            <div class="light-bg py-5 bordes" id="contact">
                <div class="container">
                    <div class="row">
                            <div class="section-title" style="margin-top: 10px !important;">
                                <small>Contactanos</small>
                            </div>
                        <div class="col-lg-6 text-center text-lg-left">
                            <!--<p class="mb-2"> <span class="ti-location-pin mr-2"></span> UNAH CU, Fco Morazán, Tegucigalpa 11101 HN</p>-->
                            <div class=" d-block d-sm-inline-block">
                                <p class="mb-2">
                                    <span class="fa fa-envelope mr-2"></span> <a class="mr-4" href="#">OocarpaRoutes@gmail.com</a>
                                </p>
                            </div>
                            <div class="d-block d-sm-inline-block">
                                <p class="mb-0">
                                    <span class="fas fa-headset mr-2"></span><a href="#">+504 9913-0393</a>
                                </p>
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="social-icons">
                                <a href="#"><span class="fab fa-facebook-f fondo"></span></a>
                                <a href="#"><span class="fab fa-twitter fondo"></span></a>
                                <a href="#"><span class="fab fa-instagram fondo"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-------------------------Fin Contactanos---------------------->

            <!---------------------------Footer------------------>
            <footer class="my-5 text-center col-md-12 col-lg-12 col-sm-12">
                <p class="mb-2"><small>COPYRIGHT © 2019. ALL RIGHTS RESERVED. Industria del Software, <a href="#"> OocarpaRoutes</a></small></p>

                <small>
                    <a href="#" class="m-2">TERMS</a>
                    <a href="#" class="m-2">PRIVACY</a>
                </small>
            </footer>
            <!---------------------------Fin Footer----------------->





        <!-- Bootstrap Core JavaScript -->
        <script src="{{asset('assets/vendor/js/bootstrap.min.js')}}"></script>
        <!-- <script src="assets/js/jquery.easing.min.js')}}"></script> -->

        <!-- theme scripts -->
        <!--<script src="{{--asset('assets/js/vegas/vegas.min.js')--}}"></script>-->
        <!--<script src="{{--asset('assets/js/parallax.js')--}}"></script>-->
        <!--<script src="{{--asset('assets/js/owl-carousel/owl.carousel.js')--}}"></script>
        <script src="{{--asset('assets/js/owl-carousel/owl.carousel.js')--}}"></script>-->


        <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('assets/js/script.js')}}"></script>

        <script src="{{asset('assets/js/countdown/jquery.countdown.js')}}"></script>
        <script src="{{asset('assets/js/counterup/jquery.counterup.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/smoothscroll.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.inview.min.js')}}"></script>

        <script src="{{ asset('js/leaflet.contextmenu.js') }}"></script>
        <script> var base_url = "{{asset('img')}}"; </script> <!-- variable para iconos del mapa juan* -->
        <script src="{{asset('js/leaflet-number-icon.js')}}"></script>
        <script src="{{asset('js/landing/mapa.js') }}"></script>
        <!-- scripts ends here-->
        <script type="text/javascript">
        //verifica si se quiere visualizar una ruta
        //si es asi la dibuja
        @if(isset($ruta))
            var ruta = $("#ruta").val();
            DibujarRuta(jQuery.parseJSON(ruta));

            window.onload = function() {
                setTimeout (function () {
                    var divPosition = $('#mapa').offset();
                    $('html, body').animate({scrollTop: divPosition.top+10}, "slow");
                }, 100); //100ms for example
            }
        @endif

        @if(isset($locations))
            var locations='<?php echo $locations;?>';
            var empresa='<?php
            $empresa=array();
                for ($i=0; $i < count($locations); $i++) {
                    $empresa[]=$locations[$i]->Company;
                }
                echo implode('#|#',$empresa);
            ?>';
            locations=JSON.parse(locations);
            empresa=empresa.split('#|#');
            DibujarMarcadores(locations,empresa);
        @endif

        @if(isset($_GET['search']))
            @if($_GET['search']!='')
                window.onload = function() {
                    setTimeout (function () {
                        var divPosition = $('#list_rutas').offset();
                        $('html, body').animate({scrollTop: divPosition.top-50}, "slow");
                    }, 100); //100ms for example
                }
            @endif
        @endif
        </script>
    </body>
</html>
