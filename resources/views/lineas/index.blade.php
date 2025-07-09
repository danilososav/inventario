@extends('adminlte::page')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Lineas</h1>
                </div>
                    <div class="col-sm-6">
                        <a class="btn btn-primary float-right" href="{{ route('lineas.create') }}">
                            <i class="fa fa-plus"></i> Añadir
                        </a>
                    </div>

            </div>
        </div>
    </section>

    <div class="content px-3">

        <div class="clearfix">
            <div class="col-sm-8">
                 @includeIf('layouts.buscador', ['url' => url()->current()])
            </div>

        </div>

        <div class="card tabla-container">
            @include('lineas.table')
        </div>
    </div>
@endsection

@section('js')
    @include('layouts.partials.alerts')
@endsection
