<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Customer;

class SalesCreate extends Component
{
    public $name, $ci, $cellphone;

    public $customers, $customer, $search;

    protected $listeners = ['selectCustomer'];

    public function mount()
    {
        $this->customers = Customer::all();
    }

    public function changeView()
    {
        $this->button = !$this->button;
        // $this->resetPage();
    }

    public function selectCustomer(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function registerCustomer()
    {
        $newCustomer = new Customer;

        $newCustomer->name = $this->name;
        $newCustomer->ci = $this->ci;
        $newCustomer->cellphone = $this->cellphone;

        $newCustomer->save();
    }

    public function render()
    {
        return view('livewire.admin.sales-create')->layout('layouts.admin');;
    }
}
