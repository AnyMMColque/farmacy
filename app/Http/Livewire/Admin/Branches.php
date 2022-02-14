<?php

namespace App\Http\Livewire\Admin;

use App\Models\Branch;
use Livewire\Component;

class Branches extends Component
{
    public $name, $address, $telephone, $turn, $nit, $authorization;
    public $lat, $lng;

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
        
    }

    public function save()
    {
        /* $this->validate($this->rules); */

        #Guardar sucursal
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

    public function render()
    {
        $branches = Branch::orderBy('created_at', 'desc')->paginate();

        return view('livewire.admin.branches', compact('branches'))->layout('layouts.admin');
    }
}
