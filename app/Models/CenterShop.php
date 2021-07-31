<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CenterShop extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class,);
    }

    public function shops()
    {
        return $this->hasMany(Shop::class,'centerShop_id','id');
    }

    public function productsSold()
    {
        return $this->hasOne(ProductSold::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class,'centerShop_id','id');
    }
}
