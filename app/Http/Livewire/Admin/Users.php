<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public $name, $ci, $address, $telephone, $email, $user;
    public $password;

    protected $rules = [
        'name' => 'required|min:6|max:30',
        'ci' => 'required|numeric',
        'address' => 'required|min:6|max:50',
        'telephone' => 'required|max:99999999|numeric',
        'email' => 'nullable',
        'user' => 'required',
        'password' => 'required|numeric',
    ];

    public function save()
    {

        #Guardar usuario
        $user = new User();

        $user->name = $this->name;
        $user->ci = $this->ci;
        $user->address = $this->address;
        $user->telephone = $this->telephone;
        $user->email = $this->email;
        $user->user = $this->user;
        $user->password = $this->password;

        $user->save();

        $this->reset(['name','ci', 'address', 'telephone', 'email', 'user', 'password']);

        $this->emit('saved');
    }
    public function render()
    {
        $users = User::orderBy('created_at', 'desc')->paginate();
        return view('livewire.admin.users', compact('users'))->layout('layouts.admin');
    }
}
