@extends('layouts.main')

@section('title', 'Listado de registros')

@section('breadcumbs')
    <div class="page-head">
        <h2 class="page-head-title">Listado de registros</h2>
        <ol class="breadcrumb page-head-nav">
        <li><a href="/home">Inicio</a></li>
        <li class="active">Listado de registros</li>
        </ol>
    </div>
@endsection

@section('content')
    <script type="text/javascript">
        jQuery(document).ready(function(){
           $('select[name="select_user"]').change(function(){
               var url = "{{ url('logs/') }}"; 
               
               if ($(this).val() != "0") {
                   url += "/" + $(this).val() ;
               } else {
                   url += "";
               }
               
               $.ajax({
                    url: url,
                })
                .done(function( data ) {
                    $('#div_log').html(data);
                });
           });
        });
        
        
        $(document).ready(function() {
            $(document).on('click', '.pagination a', function (e) {
                getPosts($(this).attr('href'));//.split('page=')[1]);
                e.preventDefault();
            });
        });
        
        function getPosts(page) {
            $.ajax({
                url : page,
            }).done(function (data) {
                $('#div_log').html(data);
            }).fail(function () {
                alert('Posts could not be loaded.');
            });
        }
    </script>
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default panel-border-color panel-border-color-primary">
                <div class="panel-heading panel-heading-divider">Listado de registros<span class="panel-subtitle">Seleccione usuario a listar los registros de seguimiento.</span></div>
                <div class="panel-body">
                    <div class="input-group col-md-12">
                        <select name="select_user" class="form-control" aria-describedby="basic-addon2">
                            <option value="0">Todos</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->user_id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <!--<span class="input-group-addon" id="basic-addon2">Usuario(s)</span>-->
                    </div>
                    <div id="div_log">
                        @include('log.list')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection