<?php

namespace App\Http\Controllers;

use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  App\Http\Controllers\Swal;

class LineaController extends Controller
{
    public function index(Request $request)
    {

        $buscar = $request->get('buscar');

        $lineas = DB::table('lineas')->where('activo', true)->orderBy('id_linea', 'desc');

        if (!empty($buscar)) {
            $lineas = $lineas->where('linea_desc', 'iLIKE', "%{$buscar}%")->orWhere('id_linea', $buscar);
        }

        if ($request->ajax()) {
            return view('lineas.table')->with('lineas', $linea->get()); // ejecuta get()
        }


        $lineas = $lineas->paginate(10);

        return view('lineas.index')->with('lineas', $lineas);
    }

    public function create()
    {

        return view('lineas.create');
    }

    public function store(Request $request)
    {

        $input = $request->all();

        $lineas = DB::table('lineas')->where('linea_desc', '=', strtoupper($input['linea_desc']))->first();

        if (!empty($lineas)) {
            return redirect()->route('lineas.index')->with('warning', 'La linea ya existe');
        }

        DB::table('lineas')->insert([
            'linea_desc' => strtoupper($input['linea_desc']),
        ]);

        return redirect()->route('lineas.index')->with('success', 'Línea guardada correctamente');
    }

    public function edit($id)
    {
        // Obtener la línea específica
        $linea = DB::table('lineas')->where('id_linea', $id)->where('activo', true)->first();

        if (empty($linea)) {
            return redirect()->route('lineas.index')->with('warning', 'La línea no existe');
        }

        // Obtener todas las líneas activas para listar
        $lineas = DB::table('lineas')->where('activo', true)->get();

        // Pasar ambas variables a la vista
        return view('lineas.edit', compact('lineas', 'linea'));
    }



    public function update(Request $request, $id)
    {
        $input = $request->all();

        $lineas = DB::table('lineas')->where('id_linea', $id)->where('activo', true)->first();

        if (empty($lineas)) {
            return redirect()->route('lineas.index')->with('warning', 'La línea no existe');
        }

        DB::table('lineas')->where('id_linea', $id)->update([
            'linea_desc' => strtoupper($input['linea_desc']),
        ]);

        return redirect()->route('lineas.index')->with('success', 'Se actualizó correctamente la línea');
    }


   public function destroy($id)
{
    $articulo = DB::table('articulos')
        ->where('id_art', $id)
        ->where('art_activo', true)
        ->first();

    if (empty($articulo)) {
        return redirect()->route('articulos.index')
            ->with('warning', 'El artículo no existe o ya está inactivo');
    }

    DB::table('articulos')
        ->where('id_art', $id)
        ->update(['art_activo' => false]);

    return redirect()->route('articulos.index')
        ->with('success', 'Se desactivó correctamente el artículo');
}


}
