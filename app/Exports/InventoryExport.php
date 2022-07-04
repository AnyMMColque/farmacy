<?php

namespace App\Exports;

use App\Models\Inventory;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class InventoryExport implements FromCollection, WithHeadings, WithMapping
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
            'Producto',
            'Stock',
            'Lote',
            'Precio',
            'Precio de venta',
            'Fecha de expiración'
        ];
    }

    public function map($inventories): array
    {
        return [
            $inventories->product->name,
            $inventories->stock,
            $inventories->lot, 
            $inventories->price, 
            $inventories->sale_price,
            $inventories->exp_date,
        ];
    }

    public function collection()
    {
        return Inventory::where('branch_id', $this->id)
                        ->where('exp_date', '<=', date('Y-m-d', strtotime('+1 month', strtotime(now()))))->get();
    }
}
