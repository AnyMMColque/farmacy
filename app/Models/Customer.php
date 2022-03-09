<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $fillable =['ci','name','cellphone'];

    public static  function search($searchKey)
    {
        return self::where('name', 'LIKE', '%' . $searchKey . '%')
            ->orWhere('ci', 'LIKE', '%' . $searchKey . '%');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
