<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ProductoController extends Controller

{
    public function index()
    {
        /* $productos = Producto::all(); */
        return view('productos.index');
    }

    public function show($id)
{
    // Ejemplo usando Eloquent


}

    /*
    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        Producto::create($request->all());
        return redirect()->route('productos.index');
    }

    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, Producto $producto)
    {
        $producto->update($request->all());
        return redirect()->route('productos.index');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index');
    }

    */
}
