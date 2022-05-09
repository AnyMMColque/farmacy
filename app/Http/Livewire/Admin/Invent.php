<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Inventory;
use Illuminate\Foundation\Testing\WithoutEvents;
use Livewire\WithPagination;

class Invent extends Component
{

    use WithPagination;

    /* Paginacion lote */
    public function paginationView()
    {
        return 'pagination::personal2-tailwind';
    }
    public function render()
    {
        $inventories = Inventory::orderBy('created_at', 'desc')->paginate();

        return view('livewire.admin.inventory', compact('inventories'))->layout('layouts.admin');
    }
}
