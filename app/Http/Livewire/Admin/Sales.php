<?php

namespace App\Http\Livewire\Admin;

use App\Models\Customer;
use Livewire\Component;

class Sales extends Component
{
    public $button = false;
    public $search, $isEmpty = '';
    public $customer;
    
    public function changeView()
    {
        $this->button = !$this->button;
    }

    public function selectCustomer(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function render()
    {
        if (!is_null($this->search)) {
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
        ])->layout('layouts.admin');
    }
}
