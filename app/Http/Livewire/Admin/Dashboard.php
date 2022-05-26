<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\Branch;
use Livewire\Component;

class Dashboard extends Component
{
    public $branch;
    public $sales = [];
    public $month = [];
    public $day = [];

    public function mount()
    {
        $this->branch = Branch::where('id', auth()->user()->branch_id)->first();

        for ($i = 6; $i >= 0; $i--) {
            $orders = Order::where('date', date("Y-m-d", strtotime(now() . "-" . $i . "days")))
                ->where('branch_id', auth()->user()->branch_id)
                ->get()->count();
            array_push($this->sales, $orders);
        }

        for ($i = 30; $i >= 0; $i--) {
            $orders = Order::where('date', date("Y-m-d", strtotime(now() . "-" . $i . "days")))
                ->where('branch_id', auth()->user()->branch_id)
                ->get()->count();
            array_push($this->month, $orders);
        }
        $this->hours();
    }

    public function hours()
    {
        $today = date("Y-m-d", strtotime(now()));
        $orders = Order::whereBetween('created_at', [$today . ' 00:00:00', $today . ' 03:59:00'])->get()->count();
        array_push ($this->day, $orders);
        $orders = Order::whereBetween('created_at', [$today . ' 04:00:00', $today . ' 07:59:00'])->get()->count();
        array_push ($this->day, $orders);
        $orders = Order::whereBetween('created_at', [$today . ' 08:00:00', $today . ' 11:59:00'])->get()->count();
        array_push ($this->day, $orders);
        $orders = Order::whereBetween('created_at', [$today . ' 12:00:00', $today . ' 15:59:00'])->get()->count();
        array_push ($this->day, $orders);
        $orders = Order::whereBetween('created_at', [$today . ' 16:00:00', $today . ' 19:59:00'])->get()->count();
        array_push ($this->day, $orders);
        $orders = Order::whereBetween('created_at', [$today . ' 20:00:00', $today . ' 23:59:00'])->get()->count();
        array_push ($this->day, $orders);
    }

    public function si()
    {
        $this->branch->turn = 'si';
        $this->branch->save();
    }

    public function no()
    {
        $this->branch->turn = 'no';
        $this->branch->save();
    }

    public function open()
    {
        $this->branch->open = 'si';
        $this->branch->save();
    }

    public function close()
    {
        $this->branch->open = 'no';
        $this->branch->save();
    }

    public function render()
    {
        return view('livewire.admin.dashboard')->layout('layouts.admin');
    }
}
