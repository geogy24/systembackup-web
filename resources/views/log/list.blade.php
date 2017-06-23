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