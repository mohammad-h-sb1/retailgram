<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRating extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class,'id','product_id');
    }

    public function UserRatinglog()
    {
        return $this->belongsTo(UserRatingLog::class,'user_rating_id','id');
    }
}
