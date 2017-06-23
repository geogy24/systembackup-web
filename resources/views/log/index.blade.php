@extends('layouts.main')

@section('title', 'Logs')

@section('subtitle', 'Listado de logs')

@section('content')
    <script type="text/javascript">
        jQuery(document).ready(function(){
           $('select[name="select_user"]').change(function(){
               $.ajax({
                    url: "{{ url('logs/') }}/" + $(this).val(),
                })
                .done(function( data ) {
                    $('#div_log').html(data);
                });
           });
        });
    </script>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="input-group">
                <select name="select_user" class="form-control" aria-describedby="basic-addon2">
                    <option value="0">Todos</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->user_id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                <span class="input-group-addon" id="basic-addon2">Usuario(s)</span>
            </div>
        </div>
    </div>
    
    <div id="div_log">
        @include('log.list')
    </div>
@endsection