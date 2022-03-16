<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\Product;
use Livewire\Component;
use App\Models\Customer;
use Livewire\WithPagination;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SalesCreate extends Component
{
    use WithPagination;

    public $name, $ci, $cellphone;

    public $customers, $customer, $search, $products;

    public $product, $quantity, $subtotal = [];

    public $listProducts = [];

    public $saveProducts, $discount = 0;
    public $total = 0;

    protected $listeners = ['selectCustomer', 'selectProduct', 'updateDiscount'];

    protected $rules = [
        'customer' => 'required',
    ];

    public function addProducts()
    {
        $this->validate([
            'product' => 'required',
            'quantity' => 'required',

        ]);
     
        if (in_array($this->product->id, $this->listProducts)) {

            $this->emit('exist');
        } else {
            array_push($this->listProducts, $this->product->id);
            array_push($this->subtotal, $this->quantity);
            $this->emit('clearProduct');
            $this->reset(['product', 'quantity']);
        }
        
    }

    public function mount()
    {
        $this->customers = Customer::all();
        $this->products = Product::all();
    }

    public function updateDiscount(){
        $this->total = $this->total - $this->discount;
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

    public function removeProduct($product_id, $key)
    {
        $remove = [];
        array_push($remove, $product_id);
        $this->listProducts = array_diff($this->listProducts, $remove);
        $this->listProducts = array_values($this->listProducts);

        unset($this->subtotal[$key]);
        $this->subtotal = array_values($this->subtotal);
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

        $this->customer = $newCustomer;

        $this->reset(['name', 'ci', 'cellphone']);
        $this->emit('saved');
        $this->emit('select', $newCustomer->name, $newCustomer->id);
    }

    public function saveOrder()
    {

        $this->validate([
            'customer' => 'required',
            'listProducts' => 'required'
        ]);

        $order = new Order;
        $order->user_id = auth()->user()->id;
        $order->customer_id = $this->customer->id;
        $order->save();

        foreach ($this->saveProducts as $key => $saveProduct) {
            DB::table('order_product')->insert([
                'product_id' => $saveProduct->id,
                'order_id' => $order->id,
                'quantity' => $this->subtotal[$key],
                'price' => $saveProduct->price,
                'discount' => $this->discount,
            ]);
        }

        // $order->total = $total - $this->discount;
        $order->save();

        return redirect(route('admin.sales'));
    }

    public function render()
    {
        $input = Product::whereIn('id', $this->listProducts)->get();
        foreach ($input as $key => $product) {
            $this->total = $this->total + $product->price * $this->subtotal[$key];
        }
        $this->saveProducts = $input;

        return view('livewire.admin.sales-create', compact('input'))->layout('layouts.admin');
    }
}
