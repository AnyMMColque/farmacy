<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Laboratories extends Component
{
    public function render()
    {
        return view('livewire.admin.laboratories')->layout('layouts.admin');
    }
}
