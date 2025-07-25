<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="marca-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Marcas</th>
                    <th>Lineas</th>
                    <th colspan="3">Operaciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articulo as $value)
                    <tr>
                        <td>{{ $value->id_art }}</td>
                        <td>{{ $value->art_desc }}</td>
                        <td>{{ $value->id_marca}}</td>
                        <td>{{ $value->id_linea}}</td>
                        <td style="width: 120px">
                            {!! Form::open(['route' => ['articulos.destroy', $value->id_art], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                     <a href="{{ route('articulos.edit', [$value->id_art]) }}"
                                        class='btn btn-default btn-sm'>
                                        <i class="far fa-edit"></i>
                                    </a>
                                    {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-sm alert-delete',
                                        'data-mensaje' => $value->art_desc
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
