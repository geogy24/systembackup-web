@extends('layouts.main')

@section('title', 'Usuarios')

@section('breadcumbs')
    <div class="page-head">
        <h2 class="page-head-title">Usuarios</h2>
        <ol class="breadcrumb page-head-nav">
        <li><a href="/home">Inicio</a></li>
        <li class="active">Usuarios</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default panel-table">
                <div class="panel-heading">
                    Usuarios
                    <span class="panel-subtitle">Cree un usuario o seleccione uno para editar o eliminar.</span>
                    <div class="tools">
                        <a href="{{ url('users/create') }}"><span class="icon mdi mdi-plus-circle"></span></a>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-borderless">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Correo electrónico</th>
                                <th>Negocio</th>
                                <th class="actions"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->business }}</td>
                                    <td class="actions">
                                            <a href="{{ url('users/' . $user->user_id . '/edit') }}"><span class="icon mdi mdi-edit" aria-hidden="true"></span></a>
                                            <span data-toggle="modal" data-target="#md-footer-danger" class="icon mdi mdi-delete" aria-hidden="true" onclick="setDeleteUrl('{{ url('users/' . $user->user_id . '/destroy') }}')"></span>
                                            <!--href="{{ url('users/' . $user->user_id . '/destroy') }}"-->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot></tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="md-footer-danger" tabindex="-1" role="dialog" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
          </div>
          <div class="modal-body">
            <div class="text-center">
              <div class="text-danger"><span class="modal-main-icon mdi mdi-close-circle-o"></span></div>
              <h3>¡Peligro!</h3>
              <p>¿Desea eliminar el registro seleccionado?</p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-default">Cancelar</button>
            <a data-name="delete-button" href="" class="btn btn-danger">Aceptar</a>
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript">
        /**
         * Set delete url
         * @param {string} url 
         */
        function setDeleteUrl(url)
        {
           $('a[data-name="delete-button"]').attr('href', url);
        }
    </script>
@endsection