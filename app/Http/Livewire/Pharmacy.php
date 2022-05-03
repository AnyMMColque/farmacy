<?php

namespace App\Http\Livewire;

use App\Models\Branch;
use Livewire\Component;

class Pharmacy extends Component
{
    public $branches;
    public $nameId = [];
    public $acent = ['Á', 'É', 'Í', 'Ó', 'Ú', 'á', 'é', 'í', 'ó', 'ú'];

    protected $listeners = ['renderMap'];

    public function mount()
    {
        $this->branches = Branch::all();
        foreach ($this->branches as $key => $branch) {
            $nameId = str_replace(" ", "", $branch->name);
            $nameId = substr(str_shuffle(strtolower(str_replace($this->acent, "", $nameId))), 0, 4);
            array_push($this->nameId, $nameId);
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
