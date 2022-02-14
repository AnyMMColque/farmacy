<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;

use App\Models\Branch;
use App\Models\Laboratory;
use App\Models\Presentation;
use Livewire\Component;

class Products extends Component
{
    public $name, $gname, $stock, $lot, $exp_date;
    public $branches, $presentations, $laboratories;
    public $true, $num;

    protected $rules = [
        'name' => 'required|min:6|max:30',
        'gname' => 'required|min:6|max:50',
        'stock' => 'required|numeric',
        'lot' => 'nullable',
        'exp_date' => 'required|date',
    ];

    protected $listeners = ['delete'];

    /* Aqui mandamos los datos de otras vistas */
    public function mount()
    {
        $this->branches =Branch::all();
        $this->presentations =Presentation::all();
        $this->laboratories =Laboratory::all();
    }
    /* Guardar Producto */
    public function save()
    {
        $product = new Product();

        $product->name = $this->name;
        $product->gname = $this->gname;
        $product->stock = $this->stock;
        $product->lot = $this->lot;
        $product->exp_date = $this->exp_date;

        $product->save();

        $this->reset(['name', 'gname', 'stock', 'lot', 'exp_date']);

        $this->emit('saved');
    }
    /* Editar Producto */
    public function edit(Laboratory $id, $true)
    {
        $this->num = $id->id;
        $this->name = $id->name;
        $this->gname = $id->gname;
        $this->stock = $id->stock;
        $this->lot = $id->lot;
        $this->exp_date = $id->exp_date;
        $this->true = $true;
    }

    public function render()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate();
        return view('livewire.admin.products', compact('products'))->layout('layouts.admin');
    }
}
