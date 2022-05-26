<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;

    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function headings(): array
    {
        return [
            'Nombre',
            'Nombre genérico',
            'Presentación',
            'Laboratorio',
            'Stock'
        ];
    }

    public function map($product): array
    {
        return [
            $product->name, //nombre
            $product->g_name, //generico
            $product->presentation->name, //presentacion
            $product->laboratory->name, //lab
            $product->stock, //stock
        ];
    }

    public function collection()
    {
        return Product::where('branch_id', $this->id)->get();
    }
}
