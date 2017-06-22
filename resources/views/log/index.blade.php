@extends('layouts.main')

@section('title', 'Logs')

@section('subtitle', 'Listado de logs')

@section('content')
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

    <table class="table">
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Titulo</th>
                <th>Descripción</th>
                <th>Fecha Creación</th>
                <th>Usuario</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
                <tr>
                    <td>
                        @if ($log->type_log == 'information')
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        @elseif ($log->type_log == 'error')
                            <i class="fa fa-times" aria-hidden="true"></i>
                        @else
                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                        @endif
                    </td>
                    <td>{{ $log->title }}</td>
                    <td>{{ $log->description }}</td>
                    <td>{{ $log->created_at }}</td>
                    <td>{{ $log->user->name }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot></tfoot>
    </table>
@endsection