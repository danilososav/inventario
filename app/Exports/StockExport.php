<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StockExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return DB::table('stock')
            ->select('id_art', 'art_desc', 'cantidad')
            ->where('activo', true)
            ->get();
    }

    public function headings(): array
    {
        return [
            'Código',
            'Descripción',
            'Cantidad',
        ];
    }
}

