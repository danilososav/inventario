<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="stock-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    {{-- <th>Activo</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($stocks as $stock)
                    <tr>
                        <td>{{ $stock->id_art }}</td>
                        <td>{{ $stock->art_desc }}</td>
                        <td>{{ $stock->cantidad }}</td>
                        {{-- <td>
                            @if ($stock->activo)
                                <span class="badge badge-success">Sí</span>
                            @else
                                <span class="badge badge-danger">No</span>
                            @endif
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            {{ $stocks->links() }}
        </div>
    </div>
</div>
