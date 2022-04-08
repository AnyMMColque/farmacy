<?php

namespace App\Models;

use App\Models\Branch;
use App\Models\Laboratory;
use App\Models\Presentation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable =['name','g_name','stock','lot','exp_date', 'price'];

    public function laboratory(){
        return $this->belongsTo(Laboratory::class);
    }

    public function branch(){
        return $this->belongsTo(Branch::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity', 'price', 'discount');
    }
    
    public function presentation(){
        return $this->belongsTo(Presentation::class);
    }
}
