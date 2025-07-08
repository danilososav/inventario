<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockController extends Controller
{
     public function index()
    {
        /* $productos = Producto::all(); */
        return view('stock.index');
    }

    public function show($id)
{
    // Ejemplo usando Eloquent


}

}
