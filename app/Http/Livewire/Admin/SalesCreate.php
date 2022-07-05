<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Branch;
use App\Models\Invoice;
use App\Models\Product;
use Livewire\Component;
use App\Models\Customer;
use App\Models\Inventory;
use Livewire\WithPagination;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SalesCreate extends Component
{
    use WithPagination;

    public $name, $ci, $email;
    public $customers, $customer, $search, $products, $pay, $change=false;
    public $product, $quantity, $subtotal = [];
    public $listProducts = [];
    public $saveProducts, $discount = 0;
    public $total = 0;
    public $lot, $lots = [];

    protected $listeners = ['selectCustomer', 'selectProduct', 'updateDiscount'];

    protected $rules = [
        'customer' => 'required',
    ];
    
    public function mount()
    {
        $this->customers = Customer::all();
        $this->products = Product::where('branch_id', auth()->user()->branch_id)->
                                    where('stock', '>=', 1)->get();
    }

    /* Agregar Productos a la Venta */
    public function addProducts()
    {
        $this->validate([
            'product' => 'required',
            'quantity' => 'required',
            'lot' => 'required',
        ]);  
        //TODO lote
        if (in_array($this->product->id, $this->listProducts)) {
            $this->emit('exist');

        } else {
            array_push($this->listProducts, $this->product->id);
            array_push($this->subtotal, $this->quantity);
            array_push($this->lots, $this->lot);
            $this->emit('clearProduct');
            $this->reset(['product', 'quantity', 'total']);

            $input = Product::whereIn('id', $this->listProducts)->get();

            $this->saveProducts = $input;

            foreach ($this->saveProducts as $key => $product) {
                $lot = $product->inventories->where('lot', $this->lots[$key])->first();
                $this->total = round($this->total + $lot->sale_price * $this->subtotal[$key], 2);
                // $this->total = $this->total + $lot->sale_price * $this->subtotal[$key];
            }
        }

        $this->reset(['pay', 'lot']);
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

    public function updatedQuantity()
    {
        $this->validate([
            'quantity' => 'required'
        ]);

        if($this->quantity > Inventory::where('lot', $this->lot)->first()->stock || $this->quantity < 0){
            $this->emit('errorStock');
            $this->reset('quantity');
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

    public function removeProduct($product_id, $key, $lot)
    {
        $remove = [];
        array_push($remove, $product_id);
        $this->listProducts = array_diff($this->listProducts, $remove);
        $this->listProducts = array_values($this->listProducts);

        unset($this->subtotal[$key]);
        $this->subtotal = array_values($this->subtotal);

        $removeLot = [];
        array_push($removeLot, $lot);
        $this->lots = array_diff($this->lots, $removeLot);
        $this->lots = array_values($this->lots);

        $input = Product::whereIn('id', $this->listProducts)->get();
        $this->saveProducts = $input;
        $this->reset('total');

        foreach ($this->saveProducts as $key => $product) {
            $lot = $product->inventories->where('lot', $this->lots[$key])->first();
            $this->total = round($this->total + $lot->sale_price * $this->subtotal[$key], 2);
        }
    }
    /*  Registrar Nuevo Usuario para realizar la venta*/
    public function registerCustomer()
    {
        $this->validate([
            'name' => 'required',
            'ci' => 'required',
            'email' => 'required'
        ]);

        $newCustomer = new Customer;

        $newCustomer->name = $this->name;
        $newCustomer->ci = $this->ci;
        $newCustomer->email = $this->email;

        $newCustomer->save();

        $this->customer = $newCustomer;

        $this->reset(['name', 'ci', 'email']);
        $this->emit('saved');
        $this->emit('select', $newCustomer->name, $newCustomer->id);
    }
    /* Registrar Venta */
    public function saveOrder()
    {

        $this->validate([
            'customer' => 'required',
            'listProducts' => 'required',
            'pay' => 'required'
        ]);

        $order = new Order;
        $order->user_id = auth()->user()->id;
        $order->customer_id = $this->customer->id;
        $order->branch_id = auth()->user()->branch->id;
        $order->pay = $this->pay;
        $order->discount = $this->discount;
        $order->date = now();
        $order->save();

        foreach ($this->saveProducts as $key => $saveProduct) {
            $lot = $saveProduct->inventories->where('lot', $this->lots[$key])->first();
            
            DB::table('order_product')->insert([
                'product_id' => $saveProduct->id,
                'order_id' => $order->id,
                'quantity' => $this->subtotal[$key],
                'price' => $lot->sale_price,
            ]);
        }

        $order->total = $this->total;
        $order->save();

        foreach ($order->products as $key => $product){
            $lot = $product->inventories->where('lot', $this->lots[$key])->first();
            $lot->stock = $lot->stock - $product->pivot->quantity;
            $lot->save();
            $stock = 0;
            foreach ($product->inventories as $key => $lot) {
                $stock += $lot->stock;
            }
            $product->qty_sold = $product->qty_sold + 1;
            $product->stock = $stock;
            $product->save();
        }

        $products = $order->products;
        $product = $products->first();
        $branch = Branch::where('id', $product->branch_id)->first();
        $branch->qty_sold += 1;
        $branch->save();

        $user = User::where('id', auth()->user()->id)->first();
        $product_string = "";
        $prices_string = "";

        foreach ($products as $product){
            $product_string .=  $product->name;   
            $prices_string .=  " (" . $product->pivot->price . "x" . $product->pivot->quantity . ")";
        }

        $date = date('Ymd', strtotime(now()));

        $controlOrder = new Order();
        $controlCode = $controlOrder->controlCode($order->id, $this->customer->ci, strval($date), floatval($order->total), 'zZ7Z]xssKqkEf_6K9uH(EcV+%x+u[Cca9T%+_$kiLjT8(zr3T9b5Fx2xG-D+_EBS', intval($branch->authorization));
        // ($invoiceId, $ci, $date, $amount, $dosageKey, $authorizationNumber)
        Invoice::create([
            'order_id' => $order->id,
            'order' => json_encode($order),
            'customer' => json_encode($this->customer),
            'user' => json_encode ($user),
            'branch' => json_encode($branch),
            'products' => json_encode($products),
            'products_string' => $product_string,
            'prices_string' => $prices_string,
            'total' => $order->total,
            'pay' => $order->pay,
            'discount' => $order->discount,
            'change' => $order->pay - ($order->total - $order->discount),
            'date' => now(),
            'controlCOde' => $controlCode
        ]);

        return redirect(route('admin.sales'));
    }

    public function render()
    {
        $input = Product::whereIn('id', $this->listProducts)->get();


        return view('livewire.admin.sales-create', compact('input'))->layout('layouts.admin');
    }
}
