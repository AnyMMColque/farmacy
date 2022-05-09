<?php

namespace App\Http\Livewire;

use App\Models\Branch;
use Livewire\Component;

class Pharmacy extends Component
{
    public $branches;
    public $nameId = [];
    public $acent = ['Á', 'É', 'Í', 'Ó', 'Ú', 'á', 'é', 'í', 'ó', 'ú'];
    public $most = [];
    public $names = [];

    protected $listeners = ['renderMap'];

    public function mount()
    {
        $this->branches = Branch::all();
        foreach ($this->branches as $key => $branch) {
            $nameId = str_replace(" ", "", $branch->name);
            $nameId = substr(str_shuffle(strtolower(str_replace($this->acent, "", $nameId))), 0, 4);
            array_push($this->nameId, $nameId);
        }
        /* Busca la disponibilidad del medicamento solicitado */
        $branches = Branch::orderBy('qty_sold', 'desc')->limit(3)->get();

        foreach ($branches as $key => $branch) {
            array_push($this->most, $branch->qty_sold);
            array_push($this->names, $branch->name);
        }
      

        /* foreach ($branches as $key => $branch) {

            $this->emit('sendMap', $branch->lat, $branch->lng, 1);
        } */
    }

    public function renderMap()
    {
        $branches = Branch::all();
        foreach ($branches as $key => $branch) {
            $this->emit('sendMap', $branch->lat, $branch->lng, $this->nameId[$key]);
        }
    }

    public function render()
    {
        return view('livewire.pharmacy');
    }
}
