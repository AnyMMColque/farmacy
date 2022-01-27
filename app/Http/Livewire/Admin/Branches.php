<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Branches extends Component
{
    public function render()
    {
        return view('livewire.admin.branches')->layout('layouts.admin');;
    }
}
