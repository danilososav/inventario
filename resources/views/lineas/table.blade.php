<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="linea-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th colspan="3">Operaciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lineas as $linea)
                    <tr>
                        <td>{{ $linea->id_linea }}</td>
                        <td>{{ $linea->linea_desc }}</td>
                        <td style="width: 120px">
                            {!! Form::open(['route' => ['lineas.destroy', $linea->id_linea], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('lineas.edit', [$linea->id_linea]) }}" class='btn btn-default btn-sm'>
                                    <i class="far fa-edit"></i>
                                </a>
                                {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm alert-delete',
                                    'data-mensaje' => $linea->linea_desc
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
        <div class="float-right">
            {{ $lineas->links() }}
        </div>
    </div>
</div>

@section('js')
    @include('layouts.partials.alerts')
@endsection
