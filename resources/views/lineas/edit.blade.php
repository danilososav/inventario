@extends('adminlte::page')


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                        Editar Articulo
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">



        <div class="card">


            {!! Form::model($articulo, ['route' => ['articulos.update', $articulo->id_articulo], 'method' => 'patch']) !!}


            <div class="card-body">

                <div class="row">
                    @include('articulos.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Grabar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('articulos.index') }}" class="btn btn-default"> Cancelar </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
@section('js')
    @include('layouts.partials.alerts')
@endsection
