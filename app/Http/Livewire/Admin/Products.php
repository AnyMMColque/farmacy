<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;

use App\Models\Branch;
use App\Models\Laboratory;
use App\Models\Presentation;
use Livewire\Component;

class Products extends Component
{
    public $name, $g_name, $stock, $lot, $exp_date;
    public $laboratory_id, $branch_id, $presentation_id;
    public $branches, $presentations, $laboratories;
    public $true, $num;

    protected $rules = [
        'name' => 'required|min:6|max:30',
        'g_name' => 'required|min:6|max:50',
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
    /* Guardar Producto  */
    public function save()
    {
        $product = new Product();

        $product->name = $this->name;
        $product->g_name = $this->g_name;
        $product->stock = $this->stock;
        $product->lot = $this->lot;
        $product->exp_date = $this->exp_date;
        $product->laboratory_id = $this->laboratory_id;
        $product->branch_id = $this->branch_id;
        $product->presentation_id = $this->presentation_id;

        $product->save();

        $this->reset(['name', 'g_name', 'stock', 'lot', 'exp_date']);

        $this->emit('saved');
    }
    /* Editar Producto */
    public function edit(Product $id, $true)
    {
        $this->num = $id->id;
        $this->name = $id->name;
        $this->g_name = $id->g_name;
        $this->stock = $id->stock;
        $this->lot = $id->lot;
        $this->exp_date = $id->exp_date;
        $this->laboratory_id = $id->laboratory_id;
        $this->branch_id = $id->branch_id;
        $this->presentation_id = $id->presentation_id;
        $this->true = $true;
    }
    /* Actualizar Producto */
    public function update(Product $product, $name, $g_name, $stock, $lot, $exp_date, $laboratory_id, $branch_id, $presentation_id)
    {
        $product->name = $name;
        $product->g_name = $g_name;
        $product->stock = $stock;
        $product->lot = $lot;
        $product->exp_date = $exp_date;
        $product->laboratory_id = $laboratory_id;
        $product->branch_id = $branch_id;
        $product->presentation_id = $presentation_id;
        $product->save();

        $this->reset(['name', 'g_name','stock','lot','exp_date','laboratory_id','branch_id','presentation_id','num', 'true']);

        $this->emit('updated');
    }
    /* Eliminar Producto */
    public function delete(Product $product)
    {
        $product->delete();
    }

    public function render()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate();
        return view('livewire.admin.products', compact('products'))->layout('layouts.admin');
    }
}
