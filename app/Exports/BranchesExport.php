<?php

namespace App\Exports;

use App\Models\Branch;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BranchesExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;

    public function headings(): array
    {
        return [
            'Nombre',
            'Nombre del propietario',
            'Número de registro profesional',
            'Dirección',
            'Teléfono',
            'NIT',
            'Número de autorización',
        ];
    }

    public function map($branch): array
    {
        return [
            $branch->name,
            $branch->name_p,
            $branch->register,
            $branch->address, 
            $branch->telephone, 
            $branch->nit,
            $branch->authorization,
        ];
    }

    public function collection()
    {
        return Branch::all();
    }
}
