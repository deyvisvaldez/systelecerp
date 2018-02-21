@extends('layouts.app')

@section('content')
<header class="page-header">
    <div class="container-fluid">
        <h2 class="no-margin-bottom">Proveedores</h2>
    </div>
</header>
<section class="dashboard-counts no-padding-bottom">
    <div class="container-fluid">
        <div class="row bg-white has-shadow">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title" style="padding:12px 0px;font-size:25px;"><strong>Import</h3>
            </div>
            <div class="panel-body">
        
                    <h3>Import File Form:</h3>
                    <form action="{{ URL::to('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
        
                        <input type="file" name="sample_file" />
                        {{ csrf_field() }}
                        <br/>
        
                        <button class="btn btn-primary">Import CSV or Excel File</button>
                        <a class="btn btn-success" href="public/uploads/pullist.xlsx">Download Sample Excel</a>
                    </form>
                    
        
            </div>
            </div>
        </div>
        <div class="row bg-white has-shadow">
            <proveedores></proveedores>
        </div>
    </div>
</section>
@endsection