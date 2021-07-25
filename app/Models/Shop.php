<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function centerShop()
    {
        return $this->belongsTo(CenterShop::class,'centerShop_id','id');
    }

    public function ProductShops()
    {
        return $this->hasMany(ProductSold::class);
    }
}
