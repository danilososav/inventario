<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="producto-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Descripción</th>
                    <th colspan="3">Operaciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($producto as $value)
                    <tr>
                        <td>{{ $value->id_prod }}</td>
                        <td>{{ $value->descripcion }}</td>
                        <td style="width: 120px">
                            {{-- {!! Form::open(['route' =>
                            ['productos.destroy', $value->id_prod],
                            'method' => 'delete']) !!}
                            <div class='btn-group'>
                                     <a href="{{ route('productos.edit', [$value->id_prod]) }}"
                                        class='btn btn-default btn-sm'>
                                        <i class="far fa-edit"></i>
                                    </a>
                                    {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-sm alert-delete',
                                        'data-mensaje' => $value->descripcion
                                    ]) !!}

                            </div>
                            {!! Form::close() !!} --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
       {{--  <div class="float-right">
         @include('adminlte-templates::common.paginate', ['records' => $producto])
        </div> --}}
    </div>
</div>
