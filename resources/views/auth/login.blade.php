@extends('layouts.app')

@section('body')
<div id="app" class="page login-page">
    <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
        <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
            <div class="info d-flex align-items-center">
                <div class="content">
                <div class="logo">
                    <h1>SYSTELEC ERP</h1>
                </div>
                <p>Un soft para la gestion de recursos empresariales de Systelec S.A</p>
                </div>
            </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
            <div class="form d-flex align-items-center">
                <div class="content">
                <form  method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} input-material" name="email" value="{{ old('email') }}" required autofocus>
                    <label for="email" class="label-material">Email</label>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    </div>
                    <div class="form-group">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} input-material" name="password" required>
                    <label for="password" class="label-material">Password</label>
                    </div>
                    <button type="submit" class="btn btn-primary">
                    Iniciar secion
                    </button>
                </form>
                <a class="btn btn-link" href="{{ route('register') }}">
                    Registrar
                </a>
                <!--
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Olvidaste tu Password?
                </a>
            -->
            </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="copyrights text-center">
        <p>2018 <a href="https://wwww.systelec.com.ar" class="external">Systelec S.A</a>
        </p>
    </div>
</div>
@endsection