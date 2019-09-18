<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta name="author" content="Codevol">
        <meta name="keywords" content="responsive, parallax, creative, comingsoon, bootstrap, html5 template, one page, landing page">
        <meta name="description" content="Fifty-One - A Creative & Multipurpose Landing Page Template">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" type="image/ico" href="./img/imagen.png" sizes="any" />
        <!-- Place favicon.ico in the root directory --> 

        <link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto" rel="stylesheet">

        <!-- style sheets -->
        <link rel="stylesheet" href="{{asset('assets/vendor/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/fifty-one.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/js/vegas/vegas.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/js/owl-carousel/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{asset('assets/js/owl-carousel/owl.theme.css')}}">
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
        <script type="text/javascript" src="{{asset('assets/js/fifty-one.js')}}"></script>
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
    <body class="play-animations" id="page-top" data-offset="50" data-spy="scroll" data-target=".navbar-fixed-top">
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

            <div class="parallax-window" data-parallax="scroll" data-image-src="{{asset('assets/images/slide-2.jpeg')}}">
                <div class="overlay"></div>
                <div id="landing">
                    <div class="container">
                        <div class="row text-center">
                            <div class="col-md-8 col-md-offset-2">
                                <h1 id="heading">WELCOME TO FIFTY-ONE</h1>
                                <p id="tagline">A creative, robust and multi purpose landing page which is designed to build your business.</p>
                            </div>
                            <div class="col-md-12 text-center landing-btns">
                            </div>
                        </div> <!-- end row -->
                    </div> <!-- end container -->
                </div> <!-- end landing -->
            </div> <!-- end parallax window -->
           <div class="parallax-window section-background" id="list_rutas" data-parallax="scroll" data-image-src="assets/images/subscribe.jpg">
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
                                                        <a class="btn-see btn btn-primary" href="{{--route('user show route',$route->id)--}}"></a>
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
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="padding: 0px">
                    <main class="main">
                        <div>
                            <div id="mapid">
                                <button id="locate-position" class="colordefault" style="display: none"><i class="eye fas fa-globe-americas fa-lg"></i></button>
                            </div>
                        </div>
                    </main>
                </div>
                
            
               
           

        <!-- Bootstrap Core JavaScript -->
        <script src="{{asset('assets/vendor/js/bootstrap.min.js')}}"></script>
        <!-- <script src="assets/js/jquery.easing.min.js')}}"></script> -->

        <!-- theme scripts -->
        <script src="{{asset('assets/js/vegas/vegas.min.js')}}"></script>
        <script src="{{asset('assets/js/parallax.js')}}"></script>
        <script src="{{asset('assets/js/owl-carousel/owl.carousel.js')}}"></script>

        <script src="{{asset('assets/js/countdown/jquery.countdown.js')}}"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
        <script src="{{asset('assets/js/counterup/jquery.counterup.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/smoothscroll.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.inview.min.js')}}"></script>

        <script src="{{ asset('js/leaflet.contextmenu.js') }}"></script>
        <script> var base_url = "{{asset('img')}}"; </script> <!-- variable para iconos del mapa juan* -->
        <script src="{{asset('js/leaflet-number-icon.js')}}"></script>
        <script src="{{asset('js/landing/mapa.js') }}"></script>
        <!-- scripts ends here-->

    </body>
</html>
