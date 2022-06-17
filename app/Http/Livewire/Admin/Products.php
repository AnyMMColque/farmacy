<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use App\Models\Branch;
use App\Models\Generic;
use App\Models\Inventory;
use App\Models\Laboratory;
use App\Models\Presentation;
use Livewire\Component;
use Livewire\WithPagination;
use phpDocumentor\Reflection\Types\Null_;

class Products extends Component
{
    use WithPagination;

    public $name, $g_name, $stock, $lot, $exp_date, $price, $sale_price;
    public $laboratory_id, $presentation_id;
    public $presentations, $laboratories;
    public $num;

    public $gnames, $gname, $gnameId;

    public $pro, $aux;

    protected $rules = [
        'gnames.*.id' => '',
        'gnames.*.gname' => '',

        'pro.id' => '',
        'pro.gname' => '',
    ];

    private $products;

    public $search = "";

    protected $listeners = ['delete', 'updateSearch', 'resetVariables'];

    protected $rules2 = [
        'name' => 'required|min:6|max:30',
        'pro' => 'required',
        'laboratory_id' => 'required',
        'presentation_id' => 'required',
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
        $this->presentations = Presentation::all();
        $this->laboratories = Laboratory::all();
        $this->getGnames();
    }
    /* Seleccionar un producto para el lote */
    public function selectProduct($id)
    {
        $this->aux = $id;
    }
    /* Actualiza el nombre generico */
    public function updatedGnameId()
    {
        $this->pro = Generic::find($this->gnameId);
    }

    public function updatedPrice()
    {
        $this->validate([
            'price' => 'numeric'
        ]);

        if (!empty($this->price)) {
            $this->sale_price = $this->price + $this->price * 0.03;
        }
    }

    public function updatedGname()
    {
        $this->getGnames();
    }
    /* Aqui introducimos la semilla de los nombres genericos */
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
        $this->resetErrorBag();
        $this->reset(['name', 'pro', 'stock', 'lot', 'exp_date', 'price', 'sale_price', 'laboratory_id', 'presentation_id', 'gnames', 'gname', 'gnameId', 'aux']);
    }
    /* Registrar por lote */
    public function addInventory(Product $product)
    {
        $this->validate([
            'stock' => 'required|numeric',
            'lot' => 'required|numeric',
            'price' => 'required|numeric',
            'exp_date' => 'required',
        ]);

        $inventory = new Inventory();
        $inventory->product_id = $this->aux;
        $inventory->branch_id = auth()->user()->branch_id;
        $inventory->stock = $this->stock;
        $inventory->lot = $this->lot;
        $inventory->price = $this->price;
        $inventory->sale_price = $this->price + $this->price * 0.03;
        $inventory->exp_date = $this->exp_date;
        $inventory->save();

        $totalStock = 0;
        foreach (Inventory::where('product_id', $this->aux)->get() as $inventoryStock) {
            $totalStock += $inventoryStock->stock;
        }

        $product->stock = $totalStock;
        $product->save();
        $this->resetVariables();
        $this->emit('saved');
    }
    /* Guardar Producto  */
    public function save()
    {
        $this->validate($this->rules2);

        $product = new Product();
        $product->name = $this->name;
        $product->g_name = $this->pro->gname;
        $product->stock = 0;
        $product->laboratory_id = $this->laboratory_id;
        $product->presentation_id = $this->presentation_id;
        $product->branch_id = Auth()->user()->branch->id;
        $product->user_id = Auth()->user()->id;
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
        $this->laboratory_id = $product->laboratory_id;
        $this->presentation_id = $product->presentation_id;
    }
    /* Actualizar Producto */
    public function update(Product $product)
    {
        $this->validate($this->rules2);

        $product->name = $this->name;
        $product->g_name = $this->pro->gname;
        $product->laboratory_id = $this->laboratory_id;
        $product->presentation_id = $this->presentation_id;
        $product->branch_id = Auth()->user()->branch->id;
        $product->save();
        $this->reset(['name', 'pro', 'stock', 'lot', 'exp_date', 'price', 'sale_price', 'laboratory_id', 'presentation_id', 'num']);
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
        $products_branch = Product::where('branch_id', Auth()->user()->branch->id);
        $products = $products_branch->where(function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%');
            $query->orwhere('g_name', 'like', '%' . $this->search . '%');
        })->orderBy('created_at', 'desc')->paginate();

        return view('livewire.admin.products', compact('products'))->layout('layouts.admin');
    }
}
