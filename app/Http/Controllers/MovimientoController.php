<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovimientoController extends Controller
{
     public function index()
    {
        /* $productos = Producto::all(); */
        return view('movimientos.index');
    }

    public function show($id)
{
    // Ejemplo usando Eloquent


}

}
