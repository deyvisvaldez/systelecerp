@extends('layouts.app')

@section('content')
<!--
<b-card  bg-variant="dark" text-variant="white" title="Card Title">
    <b-form action="{{ URL::to('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
    <b-form-group>
    {{ csrf_field() }}
    <div class="row">
        <div class="col-6">
            <b-form-file class="mb-0" name="sample_file" placeholder="Seleccione un archivo..."></b-form-file>
        </div>
        
        <div class="col-3">
            <select class="custom-select">
                <option selected>Seleccione un proveedor:</option>
                @foreach ($proveedores as $proveedor)
                <option name="proveedor_id" value={{ $proveedor->id }}>{{ $proveedor->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-3">
            <button class="btn btn-primary mb-0">Import</button>
        </div>
    </div>
    </b-form.group>
    </b-form>
</b-card>
-->
<section class="dashboard-counts no-padding-bottom">
    <div class="container-fluid">
        <div class="row bg-white has-shadow">
            <proveedores></proveedores>
        </div>
    </div>
</section>
@endsection