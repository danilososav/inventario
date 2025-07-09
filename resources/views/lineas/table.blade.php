<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="marca-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th colspan="3">Operaciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lineas as $value)
                    <tr>
                        <td>{{ $value->id_linea }}</td>
                        <td>{{ $value->linea_desc }}</td>
                        <td style="width: 120px">
                            {!! Form::open(['route' => ['lineas.destroy', $value->id_linea], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                     <a href="{{ route('lineas.edit', [$value->id_linea]) }}"
                                        class='btn btn-default btn-sm'>
                                        <i class="far fa-edit"></i>
                                    </a>
                                    {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-sm alert-delete',
                                        'data-mensaje' => $value->linea_desc
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
       {{--  <div class="float-right">
         @include('adminlte-templates::common.paginate', ['records' => $marca])
        </div> --}}
    </div>
</div>
@section('js')
    @include('layouts.partials.alerts')
@endsection
