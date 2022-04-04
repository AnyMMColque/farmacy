<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use App\Models\Branch;
use App\Models\Generic;
use App\Models\Laboratory;
use App\Models\Presentation;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    public $name, $g_name, $stock, $lot, $exp_date, $price;
    public $laboratory_id, $presentation_id;
    public $presentations, $laboratories;
    public $num;

    public $gnames, $gname, $gnameId;

    public $pro;

    protected $rules = [
        'gnames.*.id' => '',
        'gnames.*.gname' => '',

        'pro.id' => '',
        'pro.gname' => '',
    ];

    private $products;

    public $search = "";

    protected $listeners = ['delete', 'updateSearch', 'resetVariables']; 

    protected $rules2= [
        'name' => 'required|min:6|max:30',
        'pro' => 'required',
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
        $this->presentations =Presentation::all();
        $this->laboratories =Laboratory::all();
        $this->getGnames();
    }

    public function updatedGnameId()
    {
        $this->pro = Generic::find($this->gnameId);
    }

    public function updatedGname()
    {
        $this->getGnames();
    }

    public function getGnames()
    {
        $this->gnames = Generic::query()
            ->when($this->gname, function ($query, $gname) {
                return $query->where('gname', 'LIKE', '%' . $gname . '%');
            })
            ->orderBy('gname')
            ->get();
    }

    public function resetVariables()
    {
        $this->reset(['name', 'pro', 'stock', 'lot', 'exp_date', 'price', 'laboratory_id', 'presentation_id']);
    }
    /* Guardar Producto  */
    public function save()
    {
        $this->validate($this->rules2);
        
        $product = new Product();
        $product->name = $this->name;
        $product->g_name = $this->pro->gname;
        $product->stock = $this->stock;
        $product->lot = $this->lot;
        $product->exp_date = $this->exp_date;
        $product->price = $this->price;
        $product->laboratory_id = $this->laboratory_id;
        $product->presentation_id = $this->presentation_id;

        $product->save();
        $this->reset(['name', 'pro', 'stock', 'lot', 'exp_date', 'price']);
        $this->emit('saved');
    }
    /* Editar Producto */
    public function edit(Product $product)
    {
        $this->pro = Generic::where('gname', $product->g_name)->first();
        $this->gname = $this->pro->gname;
        $this->gnameId = $this->pro->id;

        $this->num = $product->id;
        $this->name = $product->name;
        $this->pro->gname = $product->g_name;
        $this->stock = $product->stock;
        $this->lot = $product->lot;
        $this->exp_date = $product->exp_date;
        $this->price = $product->price;
        $this->laboratory_id = $product->laboratory_id;
        $this->presentation_id = $product->presentation_id;
    }

    /* Actualizar Producto */
    public function update(Product $product)
    {
        $this->validate($this->rules2);

        $product->name = $this->name;
        $product->g_name = $this->pro->gname;
        $product->stock = $this->stock;
        $product->lot = $this->lot;
        $product->exp_date = $this->exp_date;
        $product->price = $this->price;
        $product->laboratory_id = $this->laboratory_id;
        $product->presentation_id = $this->presentation_id;
        
        $product->save();
        $this->reset(['name', 'pro','stock','lot','exp_date','price','laboratory_id','presentation_id','num']);
        $this->emit('updated');
    }
    /* Eliminar Producto */
    public function delete(Product $product)
    {
        $product->delete();
        $this->emit('deleted');
    }
    /* Paginacion Productos */
    public function paginationView()
    {
        return 'pagination::personal2-tailwind';
    }

    public function render()
    {
        /* Buscar producto por nombre o nombre generico */
        $products = Product::where(function($query){
            $query->where('name', 'like', '%'.$this->search.'%');
            $query->orwhere('g_name', 'like', '%'.$this->search.'%');
        })->orderBy('created_at', 'desc')->paginate();

        return view('livewire.admin.products', compact('products'))->layout('layouts.admin');
    }
}
