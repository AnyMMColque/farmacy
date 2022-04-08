<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Branch extends Model
{
    use HasFactory;
    
    protected $fillable =['name_p','register','name','address','telephone','lat','lng','turn'];

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
