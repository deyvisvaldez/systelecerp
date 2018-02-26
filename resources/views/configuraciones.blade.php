@extends('layouts.app')

@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item {{  Request::is('configuraciones_catalogos*') ? 'active' : null }}">
        <a class="nav-link" href="{{ route('configuraciones_catalogos') }}">Catalogos <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item {{  Request::is('indicadores*') ? 'active' : null }}">
        <a class="nav-link" href="#">Usuarios</a>
      </li>
      <li class="nav-item {{  Request::is('indicadores*') ? 'active' : null }}">
        <a class="nav-link" href="#">Unidades</a>
      </li>
    </ul>
  </div>
</nav>

<section class="dashboard-counts no-padding-bottom">
    <div class="container-fluid">
    @section('configuracion')
    @show
    </div>
</section>
@endsection
