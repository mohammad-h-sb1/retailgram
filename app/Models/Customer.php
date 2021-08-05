<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    const GOLDEN_LEVEL='golden_level' ;
    const SILVER_LEVEL='silver_level' ;
    const BRONZE_LEVEL='bronze_level' ;
    const NORMAL_LEVEL='normal_level' ;
    const LEVEL=[self::GOLDEN_LEVEL,self::SILVER_LEVEL,self::BRONZE_LEVEL,self::NORMAL_LEVEL];

    public function users()
    {
        return $this->hasMany(User::class,'id','user_id');
    }


    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
