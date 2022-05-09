<?php

namespace App\Http\Livewire\Admin;

use App\Models\Laboratory;
use Livewire\Component;
use Livewire\WithPagination;

class Laboratories extends Component
{
    use WithPagination;

    public $name, $description;
    public $true, $num;

    protected $rules = [
        'name' => 'required|min:3|max:30',
        'description' => 'nullable',
    ];
    
    private $laboratories;

    public $search = "";

    protected $listeners = ['delete', 'updateSearch', 'resetVariables'];  

    /* Buscar Laboratorio */
    public function updateSearch($search)
    {
        $this->search = $search;
        $this->resetPage();
    }
    /* Reinicia las variables */
    public function resetVariables()
    {
        $this->reset(['name', 'description']);
    }
    /* Guardar Laboratorio */
    public function save()
    {
        $this->validate($this->rules);

        $laboratory = new Laboratory();
        $laboratory->name = $this->name;
        $laboratory->description = $this->description;

        $laboratory->save();
        $this->reset(['name', 'description']);
        $this->emit('saved');
    }
    /* Editar Laboratorio */
    public function edit(Laboratory $id, $true)
    {
        $this->num = $id->id;
        $this->name = $id->name;
        $this->description = $id->description;
        $this->true = $true;
    }
    /* Actualizar Laboratorio */
    public function update(Laboratory $laboratory)
    {
        $laboratory->name = $this->name;
        $laboratory->description = $this->description;

        $laboratory->save();
        $this->reset(['name', 'description', 'num', 'true']);
        $this->emit('updated');
    }
    /* Eliminar Laboratorio */
    public function delete(Laboratory $laboratory)
    {
        $laboratory->delete();
        $this->emit('deleted');
    }

    /* Paginacion Laboratorio */
    public function paginationView()
    {
        return 'pagination::personal2-tailwind';
    }

    public function render()
    {
        /* Buca Sucursales por el nombre */
        $laboratories = Laboratory::where('name', 'like', '%'.$this->search.'%',)->orderBy('created_at', 'desc')->paginate(); 

        return view('livewire.admin.laboratories',compact('laboratories'))->layout('layouts.admin');
    }

}
