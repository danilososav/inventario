<?php

namespace App\Http\Controllers;

use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  App\Http\Controllers\Swal;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


class MovimientoController extends Controller
{
   public function index(Request $request)
{
    $buscar = $request->get('buscar');

    $movimientos = DB::table('movimientos')
        ->join('articulos', 'movimientos.id_art', '=', 'articulos.id_art')
        ->select('movimientos.*', 'articulos.art_desc')
        ->where('movimientos.activo', true)    // <- esta línea filtra por activo = true
        ->orderBy('movimientos.id_mov', 'desc');

    if (!empty($buscar)) {
        $movimientos = $movimientos->where('articulos.art_desc', 'ilike', "%{$buscar}%");
    }

    $movimientos = $movimientos->paginate(10);

    if ($request->ajax()) {
        return view('movimientos.table')->with('movimientos', $movimientos);
    }

    return view('movimientos.index')->with('movimientos', $movimientos);
}


    public function create()
    {
        $articulos = DB::table('articulos')->where('art_activo', true)->pluck('art_desc', 'id_art');
        $tipos = ['Ingreso' => 'Ingreso', 'Egreso' => 'Egreso'];

        return view('movimientos.create')
            ->with('articulos', $articulos)
            ->with('tipos', $tipos);
    }

    public function store(Request $request)
{
    $request->validate([
        'id_art' => 'required|integer|exists:articulos,id_art',
        'tipo_mov' => 'required|in:Ingreso,Egreso',
        'cantidad' => 'required|integer|min:1',
        'observ' => 'nullable|string|max:255',
    ]);

    $input = $request->only(['id_art', 'tipo_mov', 'cantidad', 'observ']);
    $input['fecha_crea'] = now();
    $input['activo'] = true;

    // Obtener la descripción del artículo para guardar en stock
    $articulo = DB::table('articulos')->where('id_art', $input['id_art'])->first();
    $articuloDesc = $articulo ? $articulo->art_desc : null;

    // Buscar stock existente para ese artículo
    $stock = DB::table('stock')->where('id_art', $input['id_art'])->first();

    if (!$stock) {
        // Insertar nuevo registro en stock y obtener id_stock
        $stockId = DB::table('stock')->insertGetId(
            [
                'id_art' => $input['id_art'],
                'art_desc' => $articuloDesc,
                'cantidad' => 0,
                'activo' => true,
            ],
            'id_stock'  // Nombre correcto de la PK
        );
    } else {
        $stockId = $stock->id_stock;
    }

    $input['id_stock'] = $stockId;

    // Insertar movimiento
    DB::table('movimientos')->insert($input);

    // Actualizar cantidad en stock según tipo_mov
    if ($input['tipo_mov'] === 'Ingreso') {
        DB::table('stock')->where('id_stock', $stockId)->increment('cantidad', $input['cantidad']);
    } else {
        DB::table('stock')->where('id_stock', $stockId)->decrement('cantidad', $input['cantidad']);
    }

    return redirect()->route('movimientos.index')->with('success', 'Movimiento registrado correctamente.');
}




    

    public function destroy($id)
    {
        $movimiento = DB::table('movimientos')->where('id_mov', $id)->first();

        if (!$movimiento) {
            return redirect()->route('movimientos.index')->with('warning', 'El movimiento no existe.');
        }

        // Marcamos como inactivo en vez de eliminar
        DB::table('movimientos')->where('id_mov', $id)->update(['activo' => false]);

        return redirect()->route('movimientos.index')->with('success', 'Movimiento eliminado correctamente.');
    }
}

