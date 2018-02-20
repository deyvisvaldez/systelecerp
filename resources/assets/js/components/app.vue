<template>
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
                                <li class="{{  Request::is('indicadores*') ? 'active' : null }}"><a href="{{ route('indicadores') }}"> <i class="fa fa-line-chart"></i>Indicadores </a></li>
                                <li class="{{  Request::is('obras_proyectos*') ? 'active' : null }}"><a href="{{ route('obras_proyectos') }}"> <i class="fa fa-calendar-check-o"></i>Obras y Proyectos </a></li>
                                <li class="{{  Request::is('cotizaciones*') ? 'active' : null }}"><a href="{{ route('cotizaciones') }}"> <i class="fa fa-money"></i>Cotizaciones </a></li>
                                <li class="{{  Request::is('ordenes_compras*') ? 'active' : null }}"><a href="{{ route('ordenes_compras') }}"> <i class="fa fa-credit-card"></i>Ordenes de compras </a></li>
                                <li class="{{  Request::is('stocks*') ? 'active' : null }}"><a href="{{ route('stocks') }}"> <i class="fa fa-archive"></i>Stock </a></li>
                                <li class="{{  Request::is('clientes*') ? 'active' : null }}"><a href="{{ route('clientes') }}"> <i class="fa fa-address-card-o"></i>Clientes </a></li>
                                <li class="{{  Request::is('proveedores*') ? 'active' : null }}"><a href="{{ route('proveedores') }}"> <i class="fa fa-group"></i>Proveedores </a></li>
                        </ul><span class="heading">Extras</span>
                        <ul class="list-unstyled">
                        <li class="{{  Request::is('configuraciones*') ? 'active' : null }}"><a href="{{ route('configuraciones') }}"> <i class="fa fa-gears"></i>Configuraciones </a></li>
                        </ul>
                    </nav>
                    <div id="app" class="content-inner">
                        @section('content')
                        @show
                    </div>
                </div>
        </div>
</template>
