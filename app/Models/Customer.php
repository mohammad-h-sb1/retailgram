<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->hasMany(User::class,'id','user_id');
    }


    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
