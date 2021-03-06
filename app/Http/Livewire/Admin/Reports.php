<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Artisan;

class Reports extends Component
{
    public $from, $to;
    public $dates = [];

    public function sendData()
    {
        $this->validate([
            'from' => 'required',
            'to' => 'required'
        ]);

        return redirect()->to('admin/facturas/between/' . $this->from . '/' . $this->to);
    }

    public function sendBranch()
    {
        return redirect()->to('admin/reportes/productos/' . auth()->user()->branch_id);
    }

    public function sendBranchStock()
    {
        return redirect()->to('admin/reportes/stock/' . auth()->user()->branch_id);
    }

    public function expDate()
    {
        return redirect()->to('admin/reportes/expdate/' . auth()->user()->branch_id);
    }

    public function reportBranches()
    {
        return redirect()->to('admin/reportes/farmacias/');
    }

    public function reportUsers()
    {
        return redirect()->to('admin/reportes/usuarios/');
    }
    /* Copias de Seguridad */
    public function backUp()
    {
        Artisan::call("backup:run --only-db");
        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.admin.reports')->layout('layouts.admin');
    }
}
