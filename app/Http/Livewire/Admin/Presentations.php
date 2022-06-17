<?php

namespace App\Http\Livewire\Admin;

use App\Models\Presentation;
use Livewire\Component;
use Livewire\WithPagination;

class Presentations extends Component
{
    use WithPagination;
    
    public $name, $description;
    public $true, $num;


    private $presentations;

    public $search = "";

    protected $listeners = ['delete', 'updateSearch', 'resetVariables']; 

    protected $rules = [
        'name' => 'required|min:3|max:30',
        'description' => 'nullable',
    ];

    /* Buscar Presentacion */
    public function updateSearch($search)
    {
        $this->search = $search;
        $this->resetPage();
    }

    public function resetVariables()
    {
        $this->reset(['name', 'description']);
    }

    /* Guardar Presentación */
    public function save()
    { 
        $this->validate($this->rules);
        
        $presentation = new Presentation();
        $presentation->name = $this->name;
        $presentation->description = $this->description;

        $presentation->save();
        $this->reset(['name', 'description']);
        $this->emit('saved');
    }
    /* Editar Presentacion */
    public function edit(Presentation $id, $true)
    {
        $this->num = $id->id;
        $this->name = $id->name;
        $this->description = $id->description;
        $this->true = $true;
    }
    /* Actualizar Presentacion */
    public function update(Presentation $presentation)
    {
        $presentation->name = $this->name;
        $presentation->description = $this->description;
        
        $presentation->save();
        $this->reset(['name', 'description', 'num', 'true']);
        $this->emit('updated');
    }
    /* Eliminar Presentación */
    public function delete(Presentation $presentation)
    {
        $presentation->delete();
    }
    /* Paginacion Presentacion */
    public function paginationView()
    {
        return 'pagination::personal2-tailwind';
    }

    public function render()
    {
        $presentations = Presentation::where('name', 'like', '%'.$this->search.'%',)->orderBy('created_at', 'desc')->paginate(5);

        return view('livewire.admin.presentations', compact('presentations'))->layout('layouts.admin');
    }
}
