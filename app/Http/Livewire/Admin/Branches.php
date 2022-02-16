<?php

namespace App\Http\Livewire\Admin;

use App\Models\Branch;
use Livewire\Component;

class Branches extends Component
{
    public $name, $address, $telephone, $turn, $nit, $authorization;
    public $lat, $lng;
    public $true = false;
    public $num;

    private $branches;

    public $search = "";

    protected $listeners = ['delete', 'changeTrue'];
    
    public function changeTrue()
    {
        $this->true = false;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
 
    // protected $queryString = ['search'];
    public function search()
    {
        $this->setBranches();
    }

	public function getBranches() 
    {
        
		return $this->branches;
	}

	public function setBranches() 
    {
        // $this->branches = Branch::orderBy('created_at', 'desc')->paginate();
        $this->branches = Branch::where('name', 'like', '%'.$this->search.'%',)->orderBy('created_at', 'desc')->paginate();
		// return $this->branches;
	}


    protected $rules = [
        'name' => 'required|min:6|max:30',
        'address' => 'required|min:6|max:50',
        'telephone' => 'required|max:99999999|numeric',
        'turn' => 'nullable',
        'nit' => 'required|numeric',
        'authorization' => 'required|numeric',
        'lat' => 'required',
        'lng' => 'required',
    ];

    

    public function mount()
    {
       $this->setBranches();
    }

    public function save()
    {
        $branch = new Branch();

        $branch->name = $this->name;
        $branch->address = $this->address;
        $branch->telephone = $this->telephone;
        $branch->turn = $this->turn;
        $branch->nit = $this->nit;
        $branch->authorization = $this->authorization;
        $branch->lat = $this->lat;
        $branch->lng = $this->lng;

        $branch->save();

        $this->reset(['name', 'address', 'telephone', 'turn', 'nit', 'authorization', 'lat', 'lng']);

        $this->emit('saved');
    }

    /* Editar Sucursal */
    public function edit(Branch $id)
    {
        $this->num = $id->id;
        $this->name = $id->name;
        $this->address = $id->address;
        $this->telephone = $id->telephone;
        $this->turn = $id->turn;
        $this->nit = $id->nit;
        $this->authorization = $id->authorization;
        $this->lat = $id->lat;
        $this->lng = $id->lng;
        $this->true = true;
    }
    
    /* Actualizar Sucursal */
    public function update(Branch $branch, $name, $address, $telephone, $turn, $nit, $authorization, $lat, $lng)
    {
        $branch->name = $name;
        $branch->address = $address;
        $branch->telephone = $telephone;
        $branch->turn = $turn;
        $branch->nit = $nit;
        $branch->authorization = $authorization;
        $branch->lat = $lat;
        $branch->lng = $lng;
        $branch->save();

        $this->reset(['name', 'address','telephone','turn','nit','authorization','lat','lng','num', 'true']);

        $this->emit('updated');
    }
    /* Eliminar Sucursal */
    public function delete(Branch $branch)
    {
        $branch->delete();
    }
    public function render()
    {
        $branches = Branch::where('name', 'like', '%'.$this->search.'%',)->orderBy('created_at', 'desc')->paginate();

        return view('livewire.admin.branches', compact('branches'))->layout('layouts.admin');
    }
}
