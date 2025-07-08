<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller

{
    public function index()
    {
        $producto = DB::select('select * from productos');
        return view('productos.index')->with('producto', $producto);
    }

    /* public function show($id)
{

} */


    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        /* Producto::create($request->all()); */

        return redirect()->route('productos.index');
    }
/*
    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, Producto $producto)
    {
        $producto->update($request->all());
        return redirect()->route('productos.index');
    }

    public function destroy(id $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index');
    } */


}
