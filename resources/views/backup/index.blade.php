@extends('layouts.main')

@section('title', 'Copias')

@section('subtitle', 'Listado de copias registradas')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Tamaño</th>
                        <th>Fecha creación</th>
                        <th>
                            <center>
                                Descargar
                            </center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < count($files); $i++)
                        @if ($files[$i] != '.' && $files[$i] != '..')
                            <tr>
                                <td>{{ $files[$i] }}</td>
                                <td>{{ filesize($directory . '/' . $files[$i]) . ' bytes' }}</td>
                                <td>{{ date("F d Y H:i:s", filectime($directory . '/' . $files[$i])) }}</td>
                                <td>
                                    <center>
                                        <a href="{{ url('backups/downloadfile', ['file' => $files[$i]]) }}">
                                            <span class="glyphicon glyphicon-download" aria-hidden="true"></span>
                                        </a>
                                    </center>
                                </td>
                            </tr>
                         @endif
                    @endfor
                </tbody>
                <tfoot></tfoot>
            </table>
        </div>
    </div>
@endsection