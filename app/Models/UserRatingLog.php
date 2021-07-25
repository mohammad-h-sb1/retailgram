<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRatingLog extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function userRatings()
    {
        return $this->hasMany(UserRating::class,'id','user_rating_id');
    }
    public function carts()
    {
        return $this->hasMany(Cart::class,'id','cart_id');
    }

}
