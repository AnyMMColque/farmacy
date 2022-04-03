<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Branch;
use App\Models\Invoice;
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
    public $customers, $customer, $search, $products, $pay, $change=false;
    public $product, $quantity, $subtotal = [];
    public $listProducts = [];
    public $saveProducts, $discount = 0;
    public $total = 0;

    protected $listeners = ['selectCustomer', 'selectProduct', 'updateDiscount'];

    protected $rules = [
        'customer' => 'required',
    ];
    
    public function mount()
    {
        $this->customers = Customer::all();
        $this->products = Product::all();
    }

    /* Agregar Productos a la Venta */
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

            $this->render();
            foreach ($this->saveProducts as $key => $product) {
                $this->total = $this->total + $product->price * $this->subtotal[$key];
            }
        }

        $this->reset(['pay']);
        $this->change = false;
    }

    //Para validar una varialbe antes del sunmit
    public function updatedPay()
    {
        if (intval($this->pay) <= ($this->total-$this->discount)) {
            $this->emit('pay');
            
            $this->resetPage();
        } else {
            $this->change = true;
        }
    }

    //Para detectar cambios en la variable
    /* public function updatingPay()
    {
        if (intval($this->pay) <= ($this->total-$this->discount)) {
            $this->emit('pay');
            $this->reset(['pay']);
            $this->resetPage();
        } else {
            $this->change = true;
        }
    } */

    // public function updatingDiscount(){
    //     $this->total = $this->total - $this->discount;
    // }
    /* Seleccionar un Cliente existente para realizar la venta */
    public function selectCustomer(Customer $customer)
    {
        $this->customer = $customer;
    }
    /* Seleccionar un producto existente para realizar la venta */
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
    /*  Registrar Nuevo Usuario para realizar la venta*/
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
        $order->pay = $this->pay;
        $order->discount = $this->discount;
        $order->save();

        foreach ($this->saveProducts as $key => $saveProduct) {
            DB::table('order_product')->insert([
                'product_id' => $saveProduct->id,
                'order_id' => $order->id,
                'quantity' => $this->subtotal[$key],
                'price' => $saveProduct->price,
            ]);
        }

        $order->total = $this->total;
        $order->save();

        $products = $order->products;
        $product = $products->first();
        $branch = Branch::where('id', $product->branch_id)->first();

        $user = User::where('id', auth()->user()->id)->first();
        $product_string = "";

        foreach ($products as $product){
            $product_string .=  $product->g_name . " (" . $product->pivot->price. ") ";
        }

        Invoice::create([
            'order_id' => $order->id,
            'order' => json_encode($order),
            'customer' => json_encode($this->customer),
            'user' => json_encode ($user),
            'branch' => json_encode($branch),
            'products' => json_encode($products),
            'products_string' => $product_string,
            'total' => $order->total,
            'pay' => $order->pay,
            'discount' => $order->discount,
            'change' => $order->pay - ($order->total - $order->discount)
        ]);

        return redirect(route('admin.sales'));
    }

    public function render()
    {
        $input = Product::whereIn('id', $this->listProducts)->get();

        $this->saveProducts = $input;

        return view('livewire.admin.sales-create', compact('input'))->layout('layouts.admin');
    }
}
