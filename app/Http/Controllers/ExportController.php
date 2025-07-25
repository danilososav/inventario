<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\StockExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportStock()
    {
        return Excel::download(new StockExport, 'stock.xlsx');
    }
}

