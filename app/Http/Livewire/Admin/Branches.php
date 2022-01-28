<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Branches extends Component
{
    public $name = 'pepito';
    public $address, $thelephone, $turn, $nit, $authorization;
    public $lat, $lng;

    public function mount()
    {
    }

    public function save()
    {
        $this->address = 'funcion guardar';
    }

    public function save2()
    {
        $this->address = 'funcion guardar';
    }

    public function render()
    {
        return view('livewire.admin.branches')->layout('layouts.admin');
    }
}
