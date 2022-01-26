<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Presentations extends Component
{
    public function render()
    {
        return view('livewire.admin.presentations')->layout('layouts.admin');
    }
}
