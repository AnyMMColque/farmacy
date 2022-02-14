<?php

namespace App\Http\Livewire\Admin;

use App\Models\Presentation;
use Livewire\Component;

class Presentations extends Component
{
    public $name, $description, $true, $num;

    protected $rules = [
        'name' => 'required|min:3|max:30',
        'description' => 'nullable',
    ];

    protected $listeners = ['delete'];

    /* Guardar presentación */
    public function save()
    {
        
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
    public function update(Presentation $presentation, $name, $description)
    {
        $presentation->name = $name;
        $presentation->description = $description;
        $presentation->save();

        $this->reset(['name', 'description', 'num', 'true']);

        $this->emit('updated');
    }
    /* Eliminar Presentación */
    public function delete(Presentation $presentation)
    {
        $presentation->delete();
    }

    public function render()
    {
        $presentations = Presentation::orderBy('created_at', 'desc')->paginate();

        return view('livewire.admin.presentations', compact('presentations'))->layout('layouts.admin');
    }
}
