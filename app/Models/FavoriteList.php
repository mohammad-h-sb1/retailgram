<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteList extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function users()
    {
        return $this->hasMany(User::class,'id','user_id');
    }
    public function categories()
    {
        return $this->hasMany(Category::class,'id','category_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class,'id','product_id');
    }
}
