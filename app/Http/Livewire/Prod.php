<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Prod extends Component
{
    use WithPagination;

    public $search;
    public $most = [];
    public $names = [];

    protected $listeners = ['updateSearch']; 

    public function mount()
    {
        $products = Product::orderBy('qty_sold', 'desc')->limit(3)->get();

        foreach ($products as $key => $product) {
            array_push($this->most, $product->qty_sold);
            array_push($this->names, $product->name);
        }
    }

    public function updateSearch($search)
    {
        $this->search = $search;
        $this->resetPage();
    }
    /* Paginacion */
    public function paginationView()
    {
        return 'pagination::personal2-tailwind';
    }
    public function render()
    {
        $products = Product::where(function($query){
            $query->where('name', 'like', '%'.$this->search.'%');
        })->orderBy('name', 'asc')->paginate();
        return view('livewire.prod', compact('products'));
    }
}
