<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Sales extends Component
{
    public function render()
    {
        return view('livewire.admin.sales')->layout('layouts.admin');
    }
}
