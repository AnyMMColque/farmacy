<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Customers extends Component
{
    public function render()
    {
        return view('livewire.admin.customers')->layout('layouts.admin');
    }
}
