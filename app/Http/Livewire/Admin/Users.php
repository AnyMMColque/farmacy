<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public $name, $ci, $address, $telephone, $email, $user;
    public $password;
    public $true, $num;

    protected $rules = [
        'name' => 'required|min:6|max:30',
        'ci' => 'required|numeric',
        'address' => 'required|min:6|max:50',
        'telephone' => 'required|max:99999999|numeric',
        'email' => 'nullable',
        'user' => 'required',
        'password' => 'required|numeric',
    ];
    /* Guardar Usuario */
    public function save()
    {
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
    /* Editar Usuario */
    public function edit(User $id, $true)
    {
        $this->num = $id->id;
        $this->name = $id->name;
        $this->ci = $id->ci;
        $this->address = $id->address;
        $this->telephone = $id->telephone;
        $this->email = $id->email;
        $this->user = $id->user;
        $this->password = $id->password;
        $this->true = $true;
    }
    public function update(User $user, $name, $ci, $address, $telephone, $email, $password)
    {
        $user->name = $name;
        $user->ci = $ci;
        $user->address = $address;
        $user->telephone = $telephone;
        $user->email = $email;
        $user->user = $user;
        $user->password = $password;
        $user->save();

        $this->reset(['name', 'ci','address','telephone','email','user','password', 'num', 'true']);

        $this->emit('updated');
    }

    public function render()
    {
        $users = User::orderBy('created_at', 'desc')->paginate();
        return view('livewire.admin.users', compact('users'))->layout('layouts.admin');
    }
}
