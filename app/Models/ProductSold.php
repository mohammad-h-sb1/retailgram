<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSold extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function centerShop()
    {
        return $this->belongsTo(CenterShop::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function city()
    {
        return $this->belongsTo(City::class,'city_id','id');
    }
    public function province()
    {
        return $this->belongsTo(Province::class,'province_id','id');
    }
}
