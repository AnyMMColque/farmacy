<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Branch;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class Users extends Component
{
    use WithPagination;

    public $name, $ci, $address, $telephone, $username, $branches, $branch;
    public $num, $password;

    private $users;

    public $search = "";

    public $roles, $rol, $create, $read, $update, $delete;

    protected $listeners = ['delete', 'updateSearch', 'resetVariables'];

    protected $rules = [
        'name' => 'required|min:6|max:30',
        'ci' => 'required|numeric',
        'address' => 'required|min:6|max:50',
        'telephone' => 'required|max:99999999|numeric',
        'username' => 'required|unique:users,username',
        'rol' => 'required'
    ];

    public function updatedCi()
    {
        $this->username = $this->ci;
    }

    public function mount()
    {
        $this->branches = Branch::all();
        $this->roles = Role::all()->pluck('name');
    }

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
        if (auth()->user()->getRoleNames()->first() == 'Super-Admin') {
            $this->validate([
                'name' => 'required|min:6|max:30',
                'ci' => 'required|numeric',
                'address' => 'required|min:6|max:50',
                'telephone' => 'required|max:99999999|numeric',
                'username' => 'required|unique:users,username',
                'rol' => 'required',
                'branch' => 'required'
            ]);

            $user = new User();
            $user->branch_id = $this->branch;
            $user->name = $this->name;
            $user->ci = $this->ci;
            $user->address = $this->address;
            $user->telephone = $this->telephone;
            $user->username = $this->username;
            $user->password = Hash::make($this->ci);
        } else {
            $this->validate($this->rules);

            $user = new User();
            $user->branch_id = auth()->user()->branch_id;
            $user->name = $this->name;
            $user->ci = $this->ci;
            $user->address = $this->address;
            $user->telephone = $this->telephone;
            $user->username = $this->username;
            $user->password = Hash::make($this->ci);
        }

        $user->save();
        $user->assignRole($this->rol);
        $this->reset(['name', 'ci', 'address', 'telephone', 'username', 'branch', 'num', 'rol']);
        $this->emit('saved');
    }
    /* Editar Usuario */
    public function edit($username)
    {
        $user = User::where('username', $username)->first();

        $this->name = $user->name;
        $this->ci = $user->ci;
        $this->address = $user->address;
        $this->telephone = $user->telephone;
        $this->username = $user->username;
        $this->branch = $user->branch_id;
        $this->rol = $user->getRoleNames()->first();

        $this->editUser = $user;
    }
    /* Actualizar Usuario */
    public function update()
    {
        $user = $this->editUser;
        if (auth()->user()->getRoleNames()->first() == 'Super-Admin') {
            if ($this->username !== $user->username) {
                $this->validate([
                    'name' => 'required|min:6|max:30',
                    'ci' => 'required|numeric',
                    'address' => 'required|min:6|max:50',
                    'telephone' => 'required|max:99999999|numeric',
                    'username' => 'required|unique:users,username',
                    'rol' => 'required'

                ]);
            } else {
                $this->validate([
                    'name' => 'required|min:6|max:30',
                    'ci' => 'required|numeric',
                    'address' => 'required|min:6|max:50',
                    'telephone' => 'required|max:99999999|numeric',
                    'username' => 'required|exists:users,username',
                    'rol' => 'required'
                ]);
            }

            $user->branch_id = $this->branch;
            $user->name = $this->name;
            $user->ci = $this->ci;
            $user->address = $this->address;
            $user->telephone = $this->telephone;
            $user->username = $this->username;
            $user->password = Hash::make($this->ci);
        } else {
            if ($this->username !== $user->username) {
                $this->validate([
                    'name' => 'required|min:6|max:30',
                    'ci' => 'required|numeric',
                    'address' => 'required|min:6|max:50',
                    'telephone' => 'required|max:99999999|numeric',
                    'username' => 'required|unique:users,username',
                    'rol' => 'required'
                ]);
            } else {
                $this->validate([
                    'name' => 'required|min:6|max:30',
                    'ci' => 'required|numeric',
                    'address' => 'required|min:6|max:50',
                    'telephone' => 'required|max:99999999|numeric',
                    'username' => 'required|exists:users,username',
                    'rol' => 'required'
                ]);
            }
            $user->branch_id = auth()->user()->branch_id;
            $user->name = $this->name;
            $user->ci = $this->ci;
            $user->address = $this->address;
            $user->telephone = $this->telephone;
            $user->username = $this->username;
            $user->password = Hash::make($this->ci);
        }

        $user->save();
        $aux = $user->getRoleNames()->first();
        $user->removeRole($aux);
        $user->assignRole($this->rol);
        $this->reset(['name', 'ci', 'address', 'telephone', 'username', 'password', 'rol']);
        $this->emit('updated');
    }

    /* Dar de alta Usuario */
    public function register(User $user)
    {
        if ($user->email_verified_at) {
            $user->email_verified_at = NULL;
            $user->save();
        } else {
            $user->email_verified_at = now();
            $user->save();
        }
    }

    public function saveRole()
    {
        Role::create(['name' => $this->rol])
            ->givePermissionTo('create users')
            ->givePermissionTo('read users')
            ->givePermissionTo('update users')
            ->givePermissionTo('delete users');
    }

     /* Paginacion Usuario*/
     public function paginationView()
     {
         return 'pagination::personal2-tailwind';
     }

    public function render()
    {
        if (auth()->user()->getRoleNames()->first() == 'Super-Admin') {
            $users = User::where('name', 'like', '%' . $this->search . '%',)->orderBy('created_at', 'desc')->paginate();
        } else {
            $users_branch = User::where('branch_id', auth()->user()->branch_id);
            $users = $users_branch->where('name', 'like', '%' . $this->search . '%',)->orderBy('created_at', 'desc')->paginate();
        }
        return view('livewire.admin.users', compact('users'))->layout('layouts.admin');
    }
}
