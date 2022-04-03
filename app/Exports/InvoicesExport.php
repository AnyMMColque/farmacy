<?php

namespace App\Exports;

use App\Models\Invoice;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class InvoicesExport implements FromCollection,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function map($invoice): array
    {
        return [
            $invoice->order_id,
            json_decode($invoice->branch)->nit,
            json_decode($invoice->branch)->authorization,
            $invoice->created_at,
            json_decode($invoice->customer)->ci,
            json_decode($invoice->customer)->name,
            $invoice->products_string,
            json_decode($invoice->total),
            json_decode($invoice->discount),
            json_decode($invoice->pay),
            json_decode($invoice->change),
        ];
    }

    public function headings():array{
        return[
            'Nro',
            'NIT Farmacia',
            'Nro autorización',
            'Fecha',
            'C.I./NIT',
            'Cliente',
            'Productos',
            'Total',
            'Descuento',
            'Total a pagar',
            'Cambio',
        ];
    } 

    public function collection()
    {
        return Invoice::all();
    }
}
