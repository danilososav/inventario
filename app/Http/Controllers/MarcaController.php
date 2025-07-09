<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  App\Http\Controllers\Swal;


class MarcaController extends Controller
{

    public function index(Request $request)
    {

        $buscar = $request->get('buscar');

        $marca = DB::table('marcas')->where('activo', true)
        ->orderBy('id_marca', 'desc');

        if (!empty($buscar)) {
            $marca = $marca->where('mar_desc', 'iLIKE', "%{$buscar}%")->orWhere('id_marca',$buscar);
        }

          $marca = $marca->paginate(10);

        if ($request->ajax()) {
            return view('marcas.table')->with('marca', $marca);
        }


        return view('marcas.index')->with('marca', $marca);
    }



    public function create()
    {
        return view('marcas.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $marca = DB::table('marcas') ->where('mar_desc', '=', strtoupper($input['mar_desc']))->first();

        if(!empty($marca)) {
            return redirect()->route('marcas.index')->with('warning', 'La marca ya existe');

        };

        DB::table('marcas')->insert([
            'mar_desc' => strtoupper($input['mar_desc'])]);

        return redirect()->route('marcas.index')->with('success', 'Marca guardada correctamente.');

    }

   public function edit($id)
{
    $marca = DB::table('marcas')->where('id_marca', $id)
        ->where('activo', true)->first();

    if (empty($marca)) {
        return redirect()->route('marcas.index')->with('warning', 'La marca no existe.');
    }

    return view('marcas.edit', compact('marca'));
}

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $marca = DB::table('marcas')->where('id_marca', $id)
        ->where('activo', true)->first();

        if(empty($marca)) {
            return redirect()->route('marcas.index')->with('warning', 'La marca no existe');

        };
         $marcas = DB::table('marcas')->where('id_marca', $id)
        ->where('activo', true)->first();

          if(empty($marcas)) {
            return redirect()->route('marcas.index')->with('warning', 'La marca ya existe');

        };

        DB::table('marcas')->where('id_marca', $id)->update([
        'mar_desc' => strtoupper($input['mar_desc']),]);

        return redirect()->route('marcas.index')->with('success', 'Se actualizo correctamente la marca');


    }

     public function destroy($id)
    {
        $marca = DB::table('marcas')->where('id_marca', $id)
        ->where('activo', true)->first();


        if (empty($marca)) {
            return redirect()->route('marcas.index')
            ->with('success', 'La marca no existe');
        }

        DB::table('marcas')->where('id_marca', $id)->update(['activo'=>false]);

        return redirect()->route('marcas.index')->with('success', 'Se elimino correctamente la marca');

    }
}




