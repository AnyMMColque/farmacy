<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Inventory;
use Illuminate\Foundation\Testing\WithoutEvents;
use Livewire\WithPagination;

class Invent extends Component
{
    use WithPagination;

    public $stock, $lot, $price, $sale_price, $exp_date, $aux;

    protected $listeners = [ 'updatePrice'];
    public $rules = [
        'stock' => 'required|numeric',
        'lot' => 'required|numeric',
        'price' => 'required|numeric',
        'sale_price' => 'required|numeric',
        'exp_date' => 'required',
    ];

    /* Paginacion lote */
    public function paginationView()
    {
        return 'pagination::personal2-tailwind';
    }

    public function edit(Inventory $inventory) {
        $this->aux = $inventory->id;
        $this->stock = $inventory->stock;
        $this->lot = $inventory->lot;
        $this->price = $inventory->price;
        $this->sale_price = $inventory->sale_price;
        $this->exp_date = $inventory->exp_date;
    }

    public function update(Inventory $inventory)
    {
        $this->validate($this->rules);

        $inventory->stock = $this->stock;
        $inventory->lot = $this->lot;
        $inventory->price = $this->price;
        $inventory->sale_price = $this->sale_price;
        $inventory->exp_date = $this->exp_date;
        $inventory->save();

        $product = $inventory->product;
        $totalStock = 0;
        foreach ($product->inventories as $inventoryStock) {
            $totalStock += $inventoryStock->stock;
        }
        $product->stock = $totalStock;
        $product->save();

        $this->emit('saved');
    }

    public function updatedPrice()
    {
        $this->validate([
            'price' => 'numeric'
        ]);

        if (!is_null($this->price)) {
            $this->sale_price = $this->price + $this->price * 0.03;
        }
    }

    public function render()
    {
        /* Muestra solo los lotes registrados en la farmcacia logueada */
        $inventories_branch = Inventory::where('branch_id', Auth()->user()->branch->id);
        $inventories = $inventories_branch->orderBy('created_at', 'desc')->paginate();

        return view('livewire.admin.inventory', compact('inventories'))->layout('layouts.admin');
    }
}
