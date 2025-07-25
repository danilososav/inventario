@extends('adminlte::page')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                        Crear un Articulo
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        <div class="card">
            {!! Form::open(['route' => 'articulos.store']) !!}

            <div class="card-body">
                <div class="row">
                    @include('articulos.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('articulos.index') }}" class="btn btn-default"> Cancelar </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
@section('js')
    @include('layouts.partials.alerts')
@endsection
