<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;

    public function headings(): array
    {
        return [
            'Nombre',
            'C.I.',
            'Dirección',
            'Teléfono',
            'Rol',
            'Farmacia',
        ];
    }

    public function map($user): array
    {
        return [
            $user->name,
            $user->ci,
            $user->address,
            $user->telephone, 
            $user->getRoleNames()->first(),
            $user->branch->name,
        ];
    }
    
    public function collection()
    {
        return User::all();
    }
}
