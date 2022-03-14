<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use App\Models\Customer;
use Livewire\WithPagination;
use Illuminate\Support\Collection;

class SalesCreate extends Component
{
    use WithPagination;

    public $name, $ci, $cellphone;

    public $customers, $customer, $search, $products;

    public $product, $quantity, $subtotal, $total;

    public $listProducts = [];

    protected $listeners = ['selectCustomer', 'selectProduct'];

    protected $rules = [
        'customer' => 'required',
    ];

    public function addProducts()
    {
        if (in_array($this->product->id, $this->listProducts)) {
            $this->emit('exist');
        } else {
            $this->validate([
                'product' => 'required',
                'quantity' => 'required',

            ]);
            array_push($this->listProducts, $this->product->id);
            $this->emit('clearProduct');
            $this->reset(['product', 'quantity']);
        }

    }

    public function mount()
    {
        $this->customers = Customer::all();
        $this->products = Product::all();

        $this->fill([
            'inputs' => collect([]),
        ]);
    }

    public function selectCustomer(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function selectProduct(Product $product)
    {
        $this->product = $product;
        // $this->quantity = 1;
    }

    public function removeProduct($index)
    {
        $remove = [];
        array_push($remove, $index);
        $this->listProducts = array_diff($this->listProducts, $remove);
        $this->listProducts = array_values($this->listProducts);
    }

    public function registerCustomer()
    {
        $this->validate([
            'name' => 'required',
            'ci' => 'required',
            'cellphone' => 'required'
        ]);

        $newCustomer = new Customer;

        $newCustomer->name = $this->name;
        $newCustomer->ci = $this->ci;
        $newCustomer->cellphone = $this->cellphone;

        $newCustomer->save();

        $this->reset(['name', 'ci', 'cellphone']);
        $this->emit('saved');
        $this->emit('select', $newCustomer->name, $newCustomer->id);
    }

    public function render()
    {
        $input = Product::whereIn('id', $this->listProducts)->get();

        return view('livewire.admin.sales-create', compact('input'))->layout('layouts.admin');
    }
}
