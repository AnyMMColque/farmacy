<?php

namespace App\Http\Livewire\Admin;

use App\Models\Laboratory;
use Livewire\Component;

class Laboratories extends Component
{
    public $name, $description, $true, $num;

    protected $rules = [
        'name' => 'required|min:3|max:30',
        'description' => 'nullable',
    ];

    protected $listeners = ['delete'];

    /* Guardar Laboratorio */
    public function save()
    {
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
    public function update(Laboratory $laboratory, $name, $description)
    {
        $laboratory->name = $name;
        $laboratory->description = $description;
        $laboratory->save();

        $this->reset(['name', 'description', 'num', 'true']);

        /* session()->flash('message', 'Post successfully updated.'); */
        $this->emit('updated');
    }
    /* Eliminar Laboratorio */
    public function delete(Laboratory $laboratory)
    {
        $laboratory->delete();
    }

    public function render()
    {
        $laboratories = Laboratory::orderBy('created_at', 'desc')->paginate();

        return view('livewire.admin.laboratories',compact('laboratories'))->layout('layouts.admin');
    }
}
