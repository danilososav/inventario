@extends('adminlte::page')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Stock</h1>
                </div>
                    <div class="col-sm-6">

                    </div>

            </div>
        </div>
    </section>

    <div class="content px-3">

       {{--  @include('sweetalert::alert') --}}

        <div class="clearfix">
            <div class="col-sm-8">
                @includeIf('layouts.buscador', ['url' => url()->current()])
            </div>

        </div>

        <div class="card tabla-container">
           @include('stock.table')
        </div>
        <a href="{{ route('stock.export') }}" class="btn btn-success mb-3">
    <i class="fas fa-file-excel"></i> Exportar a Excel
</a>
    </div>
@endsection
@section('js')
    @include('layouts.partials.alerts')
@endsection
