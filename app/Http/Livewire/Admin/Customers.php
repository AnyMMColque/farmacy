<?php

namespace App\Http\Livewire\Admin;

use App\Models\Customer;
use Livewire\Component;
use Livewire\WithPagination;

class Customers extends Component
{
    use WithPagination;

    public $name, $ci, $cellphone;
    public $true, $num;

    private $customers;

    public $search = "";

    protected $listeners = ['delete', 'updateSearch', 'resetVariables']; 

    protected $rules = [
        'name' => 'required|min:3|max:30',
        'ci' => 'required|numeric',
        'cellphone' => 'nullable',
    ];
    /* Buscar Cliente */
    public function updateSearch($search)
    {
        $this->search = $search;
        $this->resetPage();
    }

    public function resetVariables()
    {
        $this->reset(['name','ci', 'cellphone']);
    }
    /* Guardar Cliente */
    public function save()
    { 
        $this->validate($this->rules);
        
        $customer = new Customer();
        $customer->name = $this->name;
        $customer->ci = $this->ci;
        $customer->cellphone = $this->cellphone;

        $customer->save();
        $this->reset(['name','ci', 'cellphone']);
        $this->emit('saved');
    }
    /* Editar Cliente */
    public function edit(Customer $id, $true)
    {
        $this->num = $id->id;
        $this->name = $id->name;
        $this->ci = $id->ci;
        $this->cellphone = $id->cellphone;
        $this->true = $true;
    }
    /* Actualizar Cliente */
    public function update(Customer $customer)
    {
        $customer->name = $this->name;
        $customer->ci = $this->ci;
        $customer->cellphone = $this->cellphone;
        
        $customer->save();
        $this->reset(['name','ci', 'cellphone', 'num', 'true']);
        $this->emit('updated');
    }
    /* Eliminar Cliente */
    public function delete(Customer $customer)
    {
        $customer->delete();
    }
    /* Paginacion cliente */
    public function paginationView()
    {
        return 'pagination::personal2-tailwind';
    }
    public function render()
    {
        $customers = Customer::where('name', 'like', '%'.$this->search.'%',)->orderBy('created_at', 'desc')->paginate();

        return view('livewire.admin.customers',compact('customers'))->layout('layouts.admin');
    }
}
