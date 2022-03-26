<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use App\Models\Branch;
use App\Models\Laboratory;
use App\Models\Presentation;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    public $name, $g_name, $stock, $lot, $exp_date, $price;
    public $laboratory_id, $branch_id, $presentation_id;
    public $branches, $presentations, $laboratories;
    public $num;

    private $products;

    public $search = "";

    protected $listeners = ['delete', 'updateSearch', 'resetVariables']; 

    protected $rules = [
        'name' => 'required|min:6|max:30',
        'g_name' => 'required|min:6|max:50',
        'stock' => 'required|numeric',
        'lot' => 'nullable',
        'exp_date' => 'required|date',
        'price' => 'required|numeric',
    ];
    /* Buscar Sucursal */
    public function updateSearch($search)
    {
        $this->search = $search;
        $this->resetPage();
    }
    /* Aqui mandamos los datos de otras vistas */
    public function mount()
    {
        $this->branches =Branch::all();
        $this->presentations =Presentation::all();
        $this->laboratories =Laboratory::all();
    }
    public function resetVariables()
    {
        $this->reset(['name', 'g_name', 'stock', 'lot', 'exp_date', 'price', 'laboratory_id', 'branch_id', 'presentation_id']);
    }
    /* Guardar Producto  */
    public function save()
    {
        /* $this->validate($this->rules); */
        
        $product = new Product();
        $product->name = $this->name;
        $product->g_name = $this->g_name;
        $product->stock = $this->stock;
        $product->lot = $this->lot;
        $product->exp_date = $this->exp_date;
        $product->price = $this->price;
        $product->laboratory_id = $this->laboratory_id;
        $product->branch_id = $this->branch_id;
        $product->presentation_id = $this->presentation_id;

        $product->save();
        $this->reset(['name', 'g_name', 'stock', 'lot', 'exp_date', 'price']);
        $this->emit('saved');
    }
    /* Editar Producto */
    public function edit(Product $product)
    {
        $this->num = $product->id;
        $this->name = $product->name;
        $this->g_name = $product->g_name;
        $this->stock = $product->stock;
        $this->lot = $product->lot;
        $this->exp_date = $product->exp_date;
        $this->price = $product->price;
        $this->laboratory_id = $product->laboratory_id;
        $this->branch_id = $product->branch_id;
        $this->presentation_id = $product->presentation_id;
    }

    /* Actualizar Producto */
    public function update(Product $product)
    {
        $product->name = $this->name;
        $product->g_name = $this->g_name;
        $product->stock = $this->stock;
        $product->lot = $this->lot;
        $product->exp_date = $this->exp_date;
        $product->price = $this->price;
        $product->laboratory_id = $this->laboratory_id;
        $product->branch_id = $this->branch_id;
        $product->presentation_id = $this->presentation_id;
        
        $product->save();
        $this->reset(['name', 'g_name','stock','lot','exp_date','price','laboratory_id','branch_id','presentation_id','num']);
        $this->emit('updated');
    }
    /* Eliminar Producto */
    public function delete(Product $product)
    {
        $product->delete();
        $this->emit('deleted');
    }

    public function render()
    {
        $products = Product::where(function($query){
            $query->where('name', 'like', '%'.$this->search.'%');
            $query->orwhere('g_name', 'like', '%'.$this->search.'%');
        })->orderBy('created_at', 'desc')->paginate();

        return view('livewire.admin.products', compact('products'))->layout('layouts.admin');
    }
}
