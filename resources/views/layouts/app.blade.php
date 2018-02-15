<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Systelec ERP</title>

    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="{{ asset('css/fontastic.css') }}">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body>
        @section('login')
        @show

        @section('registre')
        @show

        
        @section('total')
        <div class="page">
                <header class="header">
                    <nav class="navbar">
                        <!-- Search Box-->
                        <div class="search-box">
                        <button class="dismiss"><i class="icon-close"></i></button>
                        <form id="searchForm" action="#" role="search">
                            <input type="search" placeholder="Que estas buscando?" class="form-control">
                        </form>
                        </div>
                        <div class="container-fluid">
                        <div class="navbar-holder d-flex align-items-center justify-content-between">
                            <!-- Navbar Header-->
                            <div class="navbar-header">
                            <!-- Navbar Brand --><a href="{{ route('indicadores') }}" class="navbar-brand">
                                <div class="brand-text brand-big"><span>Systelec</span><strong> ERP</strong></div>
                                <div class="brand-text brand-small"><strong>SY</strong></div></a>
                            <!-- Toggle Button--><a id="toggle-btn" href="{{ route('indicadores') }}" class="menu-btn active"><span></span><span></span><span></span></a>
                            </div>
                            <!-- Navbar Menu -->
                            <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                            <!-- Search-->
                            <li class="nav-item d-flex align-items-center"><a id="search" href="#"><i class="icon-search"></i></a></li>
                            <!-- Notifications-->
                            <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell-o"></i><span class="badge bg-red">12</span></a>
                                <ul aria-labelledby="notifications" class="dropdown-menu">
                                <li><a rel="nofollow" href="#" class="dropdown-item"> 
                                    <div class="notification">
                                        <div class="notification-content"><i class="fa fa-envelope bg-green"></i>You have 6 new messages </div>
                                        <div class="notification-time"><small>4 minutes ago</small></div>
                                    </div></a></li>
                                <li><a rel="nofollow" href="#" class="dropdown-item"> 
                                    <div class="notification">
                                        <div class="notification-content"><i class="fa fa-twitter bg-blue"></i>You have 2 followers</div>
                                        <div class="notification-time"><small>4 minutes ago</small></div>
                                    </div></a></li>
                                <li><a rel="nofollow" href="#" class="dropdown-item"> 
                                    <div class="notification">
                                        <div class="notification-content"><i class="fa fa-upload bg-orange"></i>Server Rebooted</div>
                                        <div class="notification-time"><small>4 minutes ago</small></div>
                                    </div></a></li>
                                <li><a rel="nofollow" href="#" class="dropdown-item"> 
                                    <div class="notification">
                                        <div class="notification-content"><i class="fa fa-twitter bg-blue"></i>You have 2 followers</div>
                                        <div class="notification-time"><small>10 minutes ago</small></div>
                                    </div></a></li>
                                <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong>view all notifications                                            </strong></a></li>
                                </ul>
                            </li>
                            <!-- Messages                        -->
                            <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-envelope-o"></i><span class="badge bg-orange">10</span></a>
                                <ul aria-labelledby="notifications" class="dropdown-menu">
                                <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                                    <div class="msg-profile"> <img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
                                    <div class="msg-body">
                                        <h3 class="h5">Jason Doe</h3><span>Sent You Message</span>
                                    </div></a></li>
                                <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                                    <div class="msg-profile"> <img src="img/avatar-2.jpg" alt="..." class="img-fluid rounded-circle"></div>
                                    <div class="msg-body">
                                        <h3 class="h5">Frank Williams</h3><span>Sent You Message</span>
                                    </div></a></li>
                                <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                                    <div class="msg-profile"> <img src="img/avatar-3.jpg" alt="..." class="img-fluid rounded-circle"></div>
                                    <div class="msg-body">
                                        <h3 class="h5">Ashley Wood</h3><span>Sent You Message</span>
                                    </div></a></li>
                                <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong>Read all messages    </strong></a></li>
                                </ul>
                            </li>
                            <!-- Logout    -->
                            <li class="nav-item"><a onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" href="#" class="nav-link logout">Logout<i class="fa fa-sign-out"></i></a></li>
                            </ul>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                        </div>
                    </nav>
                    </header>
                    <div class="page-content d-flex align-items-stretch"> 
                    <!-- Side Navbar -->
                    <nav class="side-navbar">
                        <!-- Sidebar Header-->
                        <div class="sidebar-header d-flex align-items-center">
                        <div class="avatar"><img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="title">
                            <h1 class="h4">Usuario</h1>
                            <p>tipo usuario</p>
                        </div>
                        </div>
                        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
                        <ul class="list-unstyled">
                                <li class="{{  Request::is('indicadores*') ? 'active' : null }}"><a href="{{ route('indicadores') }}"> <i class="icon-home"></i>Indicadores </a></li>
                                <li class="{{  Request::is('presupuestos*') ? 'active' : null }}"><a href="{{ route('presupuestos') }}"> <i class="icon-grid"></i>Presupuesto </a></li>
                                <li class="{{  Request::is('proyectos*') ? 'active' : null }}"><a href="{{ route('proyectos') }}"> <i class="fa fa-bar-chart"></i>Proyectos </a></li>
                                <li class="{{  Request::is('ordenes_compras*') ? 'active' : null }}"><a href="{{ route('ordenes_compras') }}"> <i class="icon-padnote"></i>Ordenes de compras </a></li>
                                <li class="{{  Request::is('stocks*') ? 'active' : null }}"><a href="{{ route('stocks') }}"> <i class="icon-padnote"></i>Stock </a></li>
                                <li class="{{  Request::is('clientes*') ? 'active' : null }}"><a href="{{ route('clientes') }}"> <i class="icon-interface-windows"></i>Clientes </a></li>
                                <li class="{{  Request::is('proveedores*') ? 'active' : null }}"><a href="{{ route('proveedores') }}"> <i class="icon-interface-windows"></i>Proveedores </a></li>
                        </ul><span class="heading">Extras</span>
                        <ul class="list-unstyled">
                        <li class="{{  Request::is('configuraciones*') ? 'active' : null }}"><a href="{{ route('configuraciones') }}"> <i class="icon-flask"></i>Configuraciones </a></li>
                        </ul>
                    </nav>
                    @section('content')
                    @show
                    @if(Route::current()->getName() == 'testing')
                        Hello This is testing
                    @endif
                </div>
        </div>
        @show
    <!-- Scripts -->
    <!--<script src="{{ asset('js/app.js') }}"></script>-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="{{ asset('vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <!-- Main File-->
    <script src="{{ asset('js/front.js') }}"></script>
</body>
</html>
