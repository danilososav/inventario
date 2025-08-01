@extends('adminlte::page')


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                        Editar Marcas
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">



        <div class="card">


            {!! Form::model($marca, ['route' => ['marcas.update', $marca->id_marca], 'method' => 'patch']) !!}

            <div class="card-body">

                <div class="row">
                    @include('marcas.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Grabar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('marcas.index') }}" class="btn btn-default"> Cancelar </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
@section('js')
    @include('layouts.partials.alerts')
@endsection
