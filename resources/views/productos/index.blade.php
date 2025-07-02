@extends('layouts.app')

@section('content')
<h1>Listado de Productos</h1>
<a href="{{ route('productos.create') }}">Crear Producto</a>

@if(session('success'))
    <div>{{ session('success') }}</div>
@endif

<table border="1">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->precio }}</td>
                <td>{{ $producto->stock }}</td>
                <td>
                    <a href="{{ route('productos.edit', $producto->id) }}">Editar</a>
                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('¿Eliminar producto?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
