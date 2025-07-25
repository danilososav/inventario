<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  App\Http\Controllers\Swal;

class ArticuloController extends Controller
{
    public function index(Request $request)
    {
        $buscar = $request->get('buscar');

        $articulo = DB::table('articulos')->select(
            'articulos.*',
            'marcas.mar_desc as marca_desc',
            'lineas.linea_desc as linea_desc'
        )
            ->join('marcas', 'marcas.id_marca', '=', 'articulos.id_marca')
            ->join('lineas', 'lineas.id_linea', '=', 'articulos.id_linea')
            ->where('art_activo', true)
            ->orderBy('articulos.id_art', 'desc');

        if (!empty($buscar)) {
            $articulo = $articulo->where(function ($query) use ($buscar) {
                $query->where('art_desc', 'iLIKE', "%{$buscar}%");

                if (is_numeric($buscar)) {
                    $query->orWhere('id_art', intval($buscar));
                }
            });
        }


        $articulo = $articulo->paginate(10);

        if ($request->ajax()) {
            return view('articulos.table')->with('articulo', $articulo);
        }

        return view('articulos.index')->with('articulo', $articulo);
    }

    public function create()
    {
        $marca = DB::table('marcas')->where('activo', true)->pluck('mar_desc', 'id_marca');
        $linea = DB::table('lineas')->where('activo', true)->pluck('linea_desc', 'id_linea');

        return view('articulos.create', compact('marca', 'linea'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'art_desc' => 'required|max:100',
            'id_marca' => 'required|exists:marcas,id_marca',
            'id_linea' => 'required|exists:lineas,id_linea',
        ]);

        $existe = DB::table('articulos')
            ->where('art_desc', strtoupper($request->art_desc))
            ->first();

        if ($existe) {
            return redirect()->route('articulos.index')
                ->with('warning', 'El artículo ya existe');
        }

        DB::table('articulos')->insert([
            'art_desc' => strtoupper($request->art_desc),
            'id_marca' => $request->id_marca,
            'id_linea' => $request->id_linea,
            'art_activo' => true
        ]);

        return redirect()->route('articulos.index')
            ->with('success', 'Artículo creado correctamente');
    }

    public function edit($id)
    {
        $articulo = DB::table('articulos')->where('id_art', $id)->first();

        if (!$articulo) {
            return redirect()->route('articulos.index')
                ->with('error', 'Artículo no encontrado');
        }

        $marca = DB::table('marcas')->where('activo', true)->pluck('mar_desc', 'id_marca');
        $linea = DB::table('lineas')->where('activo', true)->pluck('linea_desc', 'id_linea');

        return view('articulos.edit', compact('articulo', 'marca', 'linea'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'art_desc' => 'required|max:100',
            'id_marca' => 'required|exists:marcas,id_marca',
            'id_linea' => 'required|exists:lineas,id_linea',
        ]);

        $existe = DB::table('articulos')
            ->where('art_desc', strtoupper($request->art_desc))
            ->where('id_art', '!=', $id)
            ->first();

        if ($existe) {
            return redirect()->route('articulos.index')
                ->with('warning', 'Ya existe otro artículo con esa descripción');
        }

        DB::table('articulos')->where('id_art', $id)->update([
            'art_desc' => strtoupper($request->art_desc),
            'id_marca' => $request->id_marca,
            'id_linea' => $request->id_linea
        ]);

        return redirect()->route('articulos.index')
            ->with('success', 'Artículo actualizado correctamente');
    }

    public function destroy($id)
    {
        $articulo = DB::table('articulos')->where('id_art', $id)->first();

        if (!$articulo) {
            return redirect()->route('articulos.index')
                ->with('error', 'Artículo no encontrado');
        }

        DB::table('articulos')->where('id_art', $id)->delete();

        return redirect()->route('articulos.index')
            ->with('success', 'Artículo eliminado correctamente');
    }
}
