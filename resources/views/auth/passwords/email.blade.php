@extends('layouts.session')

<!-- Main Content -->
@section('content')
<div class="splash-container forgot-password">
    <div class="panel panel-default panel-border-color panel-border-color-primary">
        <div class="panel-heading"><img src="/img/logo.png" alt="logo" width="102" height="60" class="logo-img"><span class="splash-description">¿Olvidaste tu contraseña?</span></div>
        <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
            {{ csrf_field() }}
            <p>No te preocupes, te enviaremos un correo electrónico para cambiar tu contraseña.</p>
            <div class="form-group xs-pt-20">
            <input type="email" name="email" required="" placeholder="Tu correo electrónico" autocomplete="off" class="form-control">
            </div>
            <p class="xs-pt-5 xs-pb-20">¿No recuerdas tu contraseña? <a href="#">Contactar al soporte</a>.</p>
            <div class="form-group xs-pt-5">
            <button type="submit" class="btn btn-block btn-primary btn-xl">Cambiar contraseña</button>
            </div>
        </form>
        </div>
    </div>
    <div class="splash-footer">&copy; 2017 System Backup</div>
</div>

<!--<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Recuperar contraseña</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo Electrónico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-envelope"></i> Enviar enlace para restablecer contraseña
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->
@endsection
