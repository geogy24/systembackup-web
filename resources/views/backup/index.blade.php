@extends('layouts.main')

@section('title', 'Copias')

@section('breadcumbs')
    <div class="page-head">
        <h2 class="page-head-title">Copias</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="/home">Inicio</a></li>
            <li class="active">Copias</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default panel-table"> 
                <div class="panel-heading">
                    Copias
                    <span class="panel-subtitle">Listado de copias.</span>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-borderless">
                        <thead>
                            <tr>
                                @if (Auth::user()->user_type_id == 1)
                                    <th>Usuario</th>
                                @endif
                                <th>Nombre</th>
                                <th>Tamaño</th>
                                <th>Fecha creación</th>
                                <th class="actions"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($j = 0; $j < count($files); $j++)
                                @for ($i = 0; $i < count($files[$j]['files']); $i++)
                                    @if ($files[$j]['files'][$i] != '.' && $files[$j]['files'][$i] != '..')
                                        <tr>
                                            @if (Auth::user()->user_type_id == 1)
                                                <td>{{ $files[$j]['user']->name }}</td>
                                            @endif
                                            <td>{{ $files[$j]['files'][$i]->name }}</td>
                                            <td>{{ round(((($files[$j]['files'][$i]->size / 1000) / 1000) / 1000), 3, PHP_ROUND_HALF_UP) . ' Gigabit' }}</td>
                                            <td>{{ $files[$j]['files'][$i]->client_modified }}</td>
                                            <td class="actions">
                                                @if (Auth::user()->user_type_id == 1)
                                                    <span 
                                                        data-toggle="modal" 
                                                        data-target="#md-footer-danger"
                                                        class="icon mdi mdi-delete"
                                                        aria-hidden="true"
                                                        onclick="setDeleteUrl('{{ url('backups/deletefile', ['path' => $files[$j]['user']->business . '/' . $files[$j]['files'][$i]->name]) }}')">
                                                    </span>
                                                @else
                                                    <a href="{{ url('backups/downloadfile', ['path' => $files[$j]['user']->business . '/' . $files[$j]['files'][$i]->name]) }}">
                                                        <span class="icon mdi mdi-download" aria-hidden="true"></span>
                                                    </a>
                                                @endif
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