<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Users extends Component
{
    use WithPagination;

    public $name, $ci, $address, $telephone, $username, $user;
    public $password;
    public $num;

    private $users;

    public $search = "";

    public $rol, $create, $read, $update, $delete;

    protected $listeners = ['delete', 'updateSearch', 'resetVariables']; 

    protected $rules = [
        'name' => 'required|min:6|max:30',
        'ci' => 'required|numeric',
        'address' => 'required|min:6|max:50',
        'telephone' => 'required|max:99999999|numeric',
        'username' => 'required',
        'password' => 'required|numeric',
    ];
    /* Buscar Usuario */
    public function updateSearch($search)
    {
        $this->search = $search;
        $this->resetPage();
    }

    public function resetVariables()
    {
        $this->reset(['name', 'address', 'telephone', 'turn', 'nit', 'authorization', 'lat', 'lng']);
    }
    /* Guardar Usuario */
    public function save()
    {
        // $this->validate($this->rules);

        $user = new User();
        $user->name = $this->name;
        $user->ci = $this->ci;
        $user->address = $this->address;
        $user->telephone = $this->telephone;
        $user->username = $this->username;
        $user->password = Hash::make($this->password);

        $user->save();
        $this->reset(['name', 'ci','address','telephone','username','password', 'num']);
        $this->emit('saved');
    }
    /* Editar Usuario */
    public function edit(User $user1)
    {
        $this->num = $user1->id;
        $this->name = $user1->name;
        $this->ci = $user1->ci;
        $this->address = $user1->address;
        $this->telephone = $user1->telephone;
        $this->username = $user1->username;
        $this->password = $user1->password;
    }
    /* Actualizar Usuario */
    public function update(User $user1)
    {
        $user1->name = $this->name;
        $user1->ci = $this->ci;
        $user1->address = $this->address;
        $user1->telephone = $this->telephone;
        $user1->username = $this->username;
        $user1->password = Hash::make($this->password);

        $user1->save();
        $this->reset(['name', 'ci','address','telephone','username','password', 'num']);
        $this->emit('updated');
    }
    /* Eliminar Usuario */
    public function delete(User $user1)
    {
        $user1->delete();
        $this->emit('deleted');
    }

    public function saveRole()
    {
        Role::create(['name' => $this->rol])
        ->givePermissionTo('create users')
        ->givePermissionTo('read users')
        ->givePermissionTo('update users')
        ->givePermissionTo('delete users')
        ;
    }

    /* Paginacion Sucursal */
    public function paginationView()
    {
        return 'pagination::personal2-tailwind';
    }

    public function render()
    {
        $users = User::where('name', 'like', '%'.$this->search.'%',)->orderBy('created_at', 'desc')->paginate();
        return view('livewire.admin.users', compact('users'))->layout('layouts.admin');
    }
}
