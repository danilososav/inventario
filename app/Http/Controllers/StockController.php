<?php

namespace App\Http\Controllers;

use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  App\Http\Controllers\Swal;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


class StockController extends Controller
{
    public function index(Request $request)
{
    $buscar = $request->get('buscar');

    $stocks = DB::table('stock')
        ->select('id_art', 'art_desc', 'cantidad', 'activo')
        ->orderBy('id_stock', 'desc');

    if (!empty($buscar)) {
        $stocks = $stocks->where(function ($query) use ($buscar) {
            $query->where('art_desc', 'iLIKE', "%{$buscar}%");

            if (is_numeric($buscar)) {
                $query->orWhere('id_art', intval($buscar));
            }
        });
    }

    $stocks = $stocks->paginate(10);

    if ($request->ajax()) {
        return view('stock.table')->with('stocks', $stocks);
    }

    return view('stock.index')->with('stocks', $stocks);
}

}
