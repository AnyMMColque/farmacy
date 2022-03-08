<?php

namespace App\Http\Livewire\Admin;

use App\Models\Branch;
use Livewire\Component;
use Livewire\WithPagination;

class Branches extends Component
{
    use WithPagination;

    public $name, $address, $telephone, $turn, $nit, $authorization;
    public $lat, $lng;
    public $num;

    private $branches;

    public $search = "";

    protected $listeners = ['delete', 'updateSearch', 'resetVariables', 'getLatitudeFromInput']; 
    
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

    /* Buscar Sucursal */
    public function updateSearch($search)
    {
        $this->search = $search;
        $this->resetPage();
        /* if (strlen($search) > 2) {
            $this->search = $search;
            $this->resetPage();
        } else {
            $this->search = "";
        } */
    }

    public function mount()
    {

    }

    public function getLatitudeFromInput($lat, $lng)
    {
        if (!is_null($lat && $lng)){
            $this->lat = $lat;
            $this->lng = $lng;
        }
    }

    public function resetVariables()
    {
        $this->reset(['name', 'address', 'telephone', 'turn', 'nit', 'authorization', 'lat', 'lng']);
        $this->resetValidation();
    }
    /* Guardar Sucursal */
    public function save()
    {
        $this->validate($this->rules);

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
    public function edit(Branch $branch)
    {
        $this->num = $branch->id;
        $this->name = $branch->name;
        $this->address = $branch->address;
        $this->telephone = $branch->telephone;
        $this->turn = $branch->turn;
        $this->nit = $branch->nit;
        $this->authorization = $branch->authorization;
        $this->lat = $branch->lat;
        $this->lng = $branch->lng;

        $this->emit('sendLatitude', $this->lat, $this->lng);
    }    
    /* Actualizar Sucursal */
    public function update(Branch $branch)
    {   
        $this->validate($this->rules);
        $branch->name = $this->name;
        $branch->address = $this->address;
        $branch->telephone = $this->telephone;
        $branch->turn = $this->turn;
        $branch->nit = $this->nit;
        $branch->authorization = $this->authorization;
        $branch->lat = $this->lat;
        $branch->lng = $this->lng;
       
        $branch->save();        
        $this->reset(['name', 'address','telephone','turn','nit','authorization','lat','lng','num']);        
        $this->emit('updated');  
    }
    /* Eliminar Sucursal */
    public function delete(Branch $branch)
    {
        $branch->delete();
        $this->emit('deleted');
    }
    /* Paginacion Sucursal */
    public function paginationView()
    {
        return 'pagination::personal2-tailwind';
    }
    
    public function render()
    {
        // $branches = Branch::where('name', 'like', '%'.$this->search.'%',)->orderBy('created_at', 'desc')->paginate();
        $branches = Branch::where(function($query){
            $query->where('name', 'like', '%'.$this->search.'%');
            $query->orwhere('address', 'like', '%'.$this->search.'%');
        })->orderBy('created_at', 'desc')->paginate();

        /* where(function($query){
            $query->where('name', 'LIKE', '%' . $this->search . '%');
            $query->orWhere('email', 'LIKE', '%' . $this->search . '%');
        })                    
        ->paginate(); */

        return view('livewire.admin.branches', compact('branches'))->layout('layouts.admin');
    }
}
