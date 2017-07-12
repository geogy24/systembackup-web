@extends('layouts.main')

@section('title', 'Copias')

@section('subtitle', 'Listado de copias registradas')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        @if (Auth::user()->user_type_id == 1)
                            <th>Usuario</th>
                        @endif
                        <th>Nombre</th>
                        <th>Tamaño</th>
                        <th>Fecha creación</th>
                        <th>
                            <center>
                                Opciones
                            </center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @for($j = 0; $j < count($files); $j++)
                        @for ($i = 0; $i < count($files[$j]['files']); $i++)
                            @if ($files[$j]['files'][$i] != '.' && $files[$j]['files'][$i] != '..')
                                <tr>
                                    @if (Auth::user()->user_type_id == 1)
                                        <td>{{ $files[$j]['user'] }}</td>
                                    @endif
                                    <td>{{ $files[$j]['files'][$i] }}</td>
                                    <td>{{ filesize($files[$j]['directory'] . '/' . $files[$j]['files'][$i]) . ' bytes' }}</td>
                                    <td>{{ date("F d Y H:i:s", filectime($files[$j]['directory'] . '/' . $files[$j]['files'][$i])) }}</td>
                                    <td>
                                        <center>
                                            @if (Auth::user()->user_type_id == 1)
                                                <a href="{{ url('backups/deletefile', ['file' => $files[$j]['files'][$i]]) }}">
                                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                                </a>
                                            @else
                                                <a href="{{ url('backups/downloadfile', ['file' => $files[$j]['files'][$i]]) }}">
                                                    <span class="glyphicon glyphicon-download" aria-hidden="true"></span>
                                                </a>
                                            @endif
                                        </center>
                                    </td>
                                </tr>
                             @endif
                        @endfor
                    @endfor
                </tbody>
                <tfoot></tfoot>
            </table>
        </div>
    </div>
@endsection