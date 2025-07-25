<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="movimientos-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Artículo</th>
                    <th>Tipo</th>
                    <th>Cantidad</th>
                    <th>Fecha</th>
                    <th>Observación</th>
                    <th colspan="2">Operaciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movimientos as $mov)
                    <tr>
                        <td>{{ $mov->id_mov }}</td>
                        <td>{{ $mov->art_desc }}</td>
                        <td>{{ $mov->tipo_mov }}</td>
                        <td>{{ $mov->cantidad }}</td>
                        <td>{{ $mov->fecha_crea }}</td>
                        <td>{{ $mov->observ }}</td>
                        <td style="width: 120px">
                            {!! Form::open(['route' => ['movimientos.destroy', $mov->id_mov], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('movimientos.edit', [$mov->id_mov]) }}" class='btn btn-default btn-sm'>
                                    <i class="far fa-edit"></i>
                                </a>
                                {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm alert-delete',
                                    'data-mensaje' => $mov->art_desc
                                ]) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        {{ $movimientos->links() }}
    </div>
</div>

@section('js')
    @include('layouts.partials.alerts')
@endsection
