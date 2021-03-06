<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Branch;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Branches extends Component
{
    use WithPagination;

    public $name_p, $register, $name, $address, $telephone, $nit, $authorization;
    public $lat, $lng;
    public $num, $map_id;

    private $branches;

    public $search = "";

    protected $listeners = ['delete', 'updateSearch', 'resetVariables', 'getLatitudeFromInput']; 
    
    protected $rules = [
        'name_p' => 'required',
        'register' => 'required|numeric',
        'name' => 'required|min:6|max:30',
        'address' => 'required|min:6|max:50',
        'telephone' => 'required|max:99999999|numeric',
        'nit' => 'required|numeric',
        'authorization' => 'required|numeric',
        'lat' => 'required',
        'lng' => 'required',
    ];
    /* Buscar farmacia */
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

    /* Obtiene la Ubicación de la farmacia  */
    public function getLatitudeFromInput($lat, $lng)
    {
        if (!is_null($lat && $lng)){
            $this->lat = $lat;
            $this->lng = $lng;
        }
    }
    /* Reinicia las variables */
    public function resetVariables()
    {
        $this->reset(['name_p','register','name', 'address', 'telephone', 'nit', 'authorization', 'lat', 'lng']);
        $this->resetValidation();
        $this->render();
    }
    /* Guardar farmacia */
    public function save()
    {
        $this->validate($this->rules);

        $branch = new Branch();
        $branch->name_p = $this->name_p;
        $branch->register = $this->register;
        $branch->name = $this->name;
        $branch->address = $this->address;
        $branch->telephone = $this->telephone;
        $branch->nit = $this->nit;
        $branch->authorization = $this->authorization;
        $branch->lat = $this->lat;
        $branch->lng = $this->lng;
        
        $branch->save();
        $this->reset(['name_p','register','name', 'address', 'telephone', 'nit', 'authorization', 'lat', 'lng']);
        $this->emit('saved');
    }
    /* Editar farmacia */
    public function edit(Branch $branch)
    {
        $this->num = $branch->id;
        $this->name_p = $branch->name_p;
        $this->register = $branch->register;
        $this->name = $branch->name;
        $this->address = $branch->address;
        $this->telephone = $branch->telephone;
        $this->nit = $branch->nit;
        $this->authorization = $branch->authorization;
        $this->lat = $branch->lat;
        $this->lng = $branch->lng;
        $str = preg_replace( '/[0-9\@\.\-\"-"]+/', "", Str::uuid());
        $this->map_id = $str;

        $this->emit('sendLatitude', $branch->lat, $branch->lng, $this->map_id);
    }    
    /* Actualizar farmacia */
    public function update(Branch $branch)
    {   
        $this->validate($this->rules);
        $branch->name_p = $this->name_p;
        $branch->register = $this->register;
        $branch->name = $this->name;
        $branch->address = $this->address;
        $branch->telephone = $this->telephone;
        $branch->nit = $this->nit;
        $branch->authorization = $this->authorization;
        $branch->lat = $this->lat;
        $branch->lng = $this->lng;
       
        $branch->save();        
        $this->reset(['name_p','register','name', 'address','telephone','nit','authorization','lat','lng','num']);        
        $this->emit('updated');  
    }
    /* Eliminar farmacia */
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
        /* Buscar Sucursal por Nombre o Direccion */
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
