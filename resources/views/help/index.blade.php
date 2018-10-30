@extends('layouts.main')

@section('title', 'Ayuda')

@section('breadcumbs')
    <div class="page-head">
        <h2 class="page-head-title">Ayuda</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="/home">Inicio</a></li>
            <li class="active">Ayuda</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default panel-border-color panel-border-color-primary">
                <div class="panel-heading panel-heading-divider">Ayuda<span class="panel-subtitle">¿Necesitas ayuda para manejar la aplicación?.</span></div>
                <div class="panel-body">
                    <div class="panel-body">
                        <ul>
                            <li><a href="">¿Como descargo mi copia de seguridad?</a></li>
                            <li><a href="">¿C&oacute;mo cambio mi contrase&ntilde;a de seguridad?</a></li>
                            <li><a href="">¿C&oacute;mo creo un usuario nuevo?</a></li>
                            <li><a href="">¿C&oacute;mo elimino mi copia de seguridad?</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
