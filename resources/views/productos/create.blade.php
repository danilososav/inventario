@extends('adminlte::page')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                        Crear un nuevo Producto
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        <div class="card">
            {{-- @include('sweetalert::alert') --}}
            {!! Form::open(['route' => 'productos.store']) !!}

            <div class="card-body">
                <div class="row">
                    @include('productos.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('productos.index') }}" class="btn btn-default"> Cancelar </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
