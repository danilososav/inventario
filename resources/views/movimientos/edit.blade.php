@extends('adminlte::page')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Editar Movimiento</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">
            {!! Form::model($movimiento, ['route' => ['movimientos.update', $movimiento->id_mov], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('movimientos.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('movimientos.index') }}" class="btn btn-default">Cancelar</a>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('js')
    @include('layouts.partials.alerts')
@endsection
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>¡Error!</strong> Por favor corrige lo siguiente:<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
