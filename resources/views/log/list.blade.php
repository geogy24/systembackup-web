<table class="table table-striped table-borderless">
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
                        <i class="mdi mdi-info" aria-hidden="true"></i>
                    @elseif ($log->type_log == 'error')
                        <i class="mdi mdi-time" aria-hidden="true"></i>
                    @else
                        <i class="mdi mdi-alert-triangle" aria-hidden="true"></i>
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

<div class="text-center">
{{ $logs->links() }}
</div>