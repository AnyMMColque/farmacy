<?php

namespace App\Http\Livewire\Admin;

use App\Mail\Recipe;
use Livewire\Component;
use App\Models\Customer;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Mail;

class Customers extends Component
{
    use WithPagination;

    public $name, $ci, $email;
    public $true, $num, $message, $aux;

    private $customers;

    public $search = "";

    protected $listeners = ['delete', 'updateSearch', 'resetVariables']; 

    protected $rules = [
        'name' => 'required|min:3|max:30',
        'ci' => 'required|numeric',
        'email' => 'nullable',
    ];
    /* Buscar Cliente */
    public function updateSearch($search)
    {
        $this->search = $search;
        $this->resetPage();
    }

    public function resetVariables()
    {
        $this->reset(['name','ci', 'email', 'message','aux']);
        $this->resetErrorBag();
    }
    /* Guardar Cliente */
    public function save()
    { 
        $this->validate($this->rules);
        
        $customer = new Customer();
        $customer->name = $this->name;
        $customer->ci = $this->ci;
        $customer->email = $this->email;

        $customer->save();
        $this->resetVariables();
        $this->emit('saved');
    }

    public function selectUser($key)
    {
        $this->aux = $key;
    }

    public function send()
    {
        $this->validate([
            'message' => 'required'
        ]);

        /* $this->user->notify(new NotifyUser($this->toMail)); */
        $customer = Customer::find($this->aux);
        Mail::to($customer->email)->send(new Recipe($this->message));

        
        $this->emit('saved');
    }

    /* Editar Cliente */
    public function edit(Customer $id, $true)
    {
        $this->num = $id->id;
        $this->name = $id->name;
        $this->ci = $id->ci;
        $this->email = $id->email;
        $this->true = $true;
    }
    /* Actualizar Cliente */
    public function update(Customer $customer)
    {
        $customer->name = $this->name;
        $customer->ci = $this->ci;
        $customer->email = $this->email;
        
        $customer->save();
        $this->reset(['name','ci', 'email', 'num', 'true']);
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
