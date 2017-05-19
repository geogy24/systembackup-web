@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo electrónico</th>
                    <th>Negocio</th>
                    <th>
                        <center>
                            Opciones
                        </center>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->business }}</td>
                        <td>
                            <center>
                                <a href="{{ url('users/' . $user->user_id . '/edit') }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                <a href="{{ url('users/' . $user->user_id . '/destroy') }}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                            </center>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot></tfoot>
        </table>
        
        <a href="{{ url('users/create') }}"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
    </div>
@endsection