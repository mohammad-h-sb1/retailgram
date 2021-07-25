<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stylist extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user()
    {
        return  $this->belongsTo(User::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class,'product_stylist','stylist_id','product_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class,'styList_id','id');
    }

    public function StylistProduct()
    {
        return $this->hasOne(StylistProduct::class,'stylist_id','id');
    }
}
