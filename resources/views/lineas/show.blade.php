@extends('adminlte::page')

@section('title', 'Detalle del Producto')

@section('content_header')
    <h1>Detalle del Producto</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h5><strong>Nombre:</strong> {{ $producto->nombre }}</h5>
            <p><strong>Precio:</strong> {{ $producto->precio }}</p>
            <p><strong>Descripción:</strong> {{ $producto->descripcion ?? 'Sin descripción' }}</p>

            <a href="{{ route('productos.index') }}" class="btn btn-secondary mt-3">Volver al listado</a>
        </div>
    </div>
@stop

