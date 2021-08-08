<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class,'id','tag_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class,'id','product_id');
    }
    public function getJalaly()
    {
        return verta($this->created_at)->format('Y/m/d');
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    public function userRatingLog()
    {
        return $this->belongsTo(UserRating::class);
    }

    public function payment()
    {
        return $this->hasMany(Payment::class,);
    }

//    public function number()
//    {
//        return $this->belongsTo(Cart::class,'number','id');
//    }
}
