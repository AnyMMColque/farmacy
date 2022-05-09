<?php

namespace App\Models;

use App\Models\User;
use App\Models\Branch;
use App\Models\Inventory;
use App\Models\Laboratory;
use App\Models\Presentation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable =['name','g_name','stock','lot','exp_date', 'price', 'sale_price', 'qty_sold'];

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

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
}
