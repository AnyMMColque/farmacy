<?php

namespace App\Models;

use App\Models\Branch;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inventory extends Model
{
    use HasFactory;

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function branch(){
        return $this->belongsTo(Branch::class);
    }
}
