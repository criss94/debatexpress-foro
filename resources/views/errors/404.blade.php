<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title','Parece que esta página no existe')</title>

    <!-- Styles -->
    <!--<link rel="stylesheet" href="/css/materialize.min.css">-->
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/editor.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/alertify.min.css">
    <!-- Usa la metaetiqueta theme color para especificar el color de tema para Chrome en Android. -->
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#0D47A1">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>
<body style="width:100%;height:100%;background: #010117;background: #fff">

    <div id="particles-js" style="position: fixed;top: 0px;left: 0px;width: 100%;height: 100%;"></div>

    <div id="app" class="col-xs-12 col-sm-12 col-sm-offset-0 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2" style="background: #fff">

        <nav class="navbar navbar-default navbar-fixed-top col-xs-12 col-sm-12 col-sm-offset-0 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
            <div class="container col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    @if(Auth::check() && Auth::user()->role == 'admin')
                    <span style="position:absolute;top:5px;left:55px;font-size: 1.3rem">debate</span>
                    <a class="navbar-brand" href="{{ url('admin') }}">
                        <strong style="display:block;margin:5px 17px 0px 0px;font-family: 'Oleo Script Swash Caps', cursive;font-size: 3.5rem">Express</strong>
                    </a>
                    @else
                    <span style="position:absolute;top:5px;left:55px;font-size: 1.3rem">debate</span>
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <strong style="display:block;margin:5px 17px 0px 0px;font-family: 'Oleo Script Swash Caps', cursive;font-size: 3.5rem">Express</strong>
                    </a>
                    @endif
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                    @if(Auth::check() && Auth::user()->role == 'Admin')
                        <li><a href="{{ url('/usuarios') }}"><i class="fa fa-users" aria-hidden="true"></i> Usuarios</a></li>
                        <li><a href="{{ url('/categorias') }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Categorias</a></li>
                        <li><a href="{{ url('/comentarios') }}"><i class="fa fa-commenting" aria-hidden="true"></i> Comentarios</a></li>
                        <li><a href="{{ url('/usuarios') }}"><i class="fa fa-cogs" aria-hidden="true"></i> Mi cuenta</a></li>
                    @else
                        <li><a href="{{ url('/') }}"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a></li>
                        <li><a href="{{ url('/foros') }}"><i class="fa fa-foursquare" aria-hidden="true"></i> Foros</a></li>
                        <li><a href="{{ url('/miembros') }}"><i class="fa fa-users" aria-hidden="true"></i> Miembros</a></li>
                    @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (!Auth::check())
                            <li>
                                <a class="inactivo-user" href="{{ url('/login') }}"><i class="fa fa-user" aria-hidden="true"></i>
                                    Ingresar</a>
                            </li>
                            <li>
                                <a class="inactivo-regis" href="{{ url('/register') }}"><i class="fa fa-unlock" aria-hidden="true"></i> Registrarse</a>
                            </li>
                        @else
                            <li class="dropdown btn_salir_caja">
                                
                                <a id="logout" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                @if(Auth::user()->avatar != '')
                                <figure class="caja_img_red_social"><img class="img_red_social" src="{{ Auth::user()->avatar }}"></figure> 
                                @elseif(Auth::user()->genero == 'M')
                                <figure class="caja_img_red_social"><img class="img_red_social" src="/img/man.png"></figure>
                                @elseif(Auth::user()->genero == 'F')
                                <figure class="caja_img_red_social"><img class="img_red_social" src="/img/woman.png"></figure>
                                @endif
                                    {{ ucwords(Auth::user()->name) }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div id="pading-top-general">
            <!-- minimo para que el footer no quede corto -->
            <div style="min-height: 800px">
            	<div id="pageNotFound">
            		<img src="/img/404.jpg" class="img-responsive" alt="Pagina no encontrada">
                </div>
                <a id="pageVolver" href="{{ url('/') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i> volver a la página principal</a>
            </div>
        </div>

        <div class="footer">
            <p class="primer-p">debate Express, Es un lugar donde puedes pasar tu tiempo libre, compartir, opinar y debatir en los temas que te interese o bien crear tu propio tema.</p>
            <p>Derechos de Autor Cristian Veizaga &copy <?php echo date('Y'); ?> . Todos los derechos reservados</p>
        </div>

    </div>
    <!-- scripts -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/app.js"></script>
</body>
</html>
