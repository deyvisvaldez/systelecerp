@extends('layouts.app')

@section('content')
<header class="page-header">
    <div class="container-fluid">
        <h2 class="no-margin-bottom">Presupuesto</h2>
    </div>
</header>
<section class="dashboard-counts no-padding-bottom">
    <div class="container-fluid">
        <div class="row bg-white has-shadow">
            <presupuestos></presupuestos>
        </div>
    </div>
</section>
@endsection