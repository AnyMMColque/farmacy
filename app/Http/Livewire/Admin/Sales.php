<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;
use App\Models\Customer;
use Livewire\WithPagination;

class Sales extends Component
{
    use WithPagination;

    public function new()
    {
        return redirect(route('admin.sales.create'));
    }

    public function status(Order $order)
    {
        $order->status = 1;
        $order->save();

        foreach ($order->products as $product){
            $product->stock = $product->stock + $product->pivot->quantity;
            $product->save();
        }
    }

    public function render()
    {
        /* if (!is_null($this->search)) {
            $articles = Customer::search($this->search)
                ->take(5)
                ->get();
            $this->isEmpty = '';
        } else {
            $articles = [];
            $this->isEmpty = __('Nothings Found.');
        }

        return view('livewire.admin.sales', [
            'articles' => $articles,
        ])->layout('layouts.admin'); */
        $orders = Order::where('branch_id', Auth()->user()->branch->id)->orderBy('created_at', 'desc')->paginate(5);

        return view('livewire.admin.sales', compact('orders'))->layout('layouts.admin');
    }
}
