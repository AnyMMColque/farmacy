<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable =['order_id', 'order', 'customer', 'user','branch', 'products', 'products_string', 'total', 'pay', 'discount', 'change', 'status', 'date', 'prices_string', 'controlCOde'];
}
