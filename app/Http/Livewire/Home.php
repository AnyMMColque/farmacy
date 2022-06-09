<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Ramsey\Uuid\Type\Integer;

class Home extends Component
{
    use WithPagination;
    
    public $name;
    public $stock;
    public $products;
    /* Limpiar los campos llenados con variables */
    public function resetVariables()
    {
        $this->reset(['name', 'stock']);
    }
    /* Busca el producto solicitado con el nombre y el stock */
    public function ShowProducts()
    {
        $this->validate([
            'name' => 'required|max:20|min:3',
            'stock' => 'required|numeric',
        ]);
        $this->products = Product::where(function($query){
            $query->where('name', 'like', '%'.$this->name.'%');
            $query->where('stock', '>=', intval($this->stock));

            $this->reset();
        })->orderBy('name', 'asc')->get();     
    }
    public function render()
    {
        return view('livewire.home');
    }
}
