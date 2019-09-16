@extends('layouts.session')

@section('content')
<div class="splash-container">
    <div class="panel panel-default panel-border-color panel-border-color-primary">
        <div class="panel-heading"><img src="img/logo.png" alt="logo" width="102" height="60" class="logo-img"><span class="splash-description">Por favor ingresa la información de tu usuario.</span></div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}
                <div class="form-group">
                    <input id="email" type="email" placeholder="Correo electrónico" name="email" autocomplete="off" class="form-control">
                </div>
                <div class="form-group">
                    <input id="password" type="password" placeholder="Contraseña" name="password" class="form-control">
                </div>
                <div class="form-group row login-tools">
                    <div class="col-xs-6 login-remember">
                        <div class="be-checkbox">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">Recuerdame</label>
                        </div>
                    </div>
                    <div class="col-xs-6 login-forgot-password"><a href="{{ url('/password/reset') }}">¿Olvidaste tu contraseña?</a></div>
                </div>
                <div class="form-group login-submit">
                    <button data-dismiss="modal" type="submit" class="btn btn-primary btn-xl">Iniciar sesión</button>
                </div>
            </form>
        </div>
    </div>
    <!--<div class="splash-footer"><span>Don't have an account? <a href="#">Sign Up</a></span></div>-->
</div>
<!--    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">Correo electrónico</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Contraseña</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password">

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember"> Recuerdame
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-sign-in"></i> Iniciar sesión
                </button>

                <a class="btn btn-link" href="{{ url('/password/reset') }}">¿Olvidaste tu contraseña?</a>
            </div>
        </div>
    </form>-->
@endsection
