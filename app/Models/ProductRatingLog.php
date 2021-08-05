<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRatingLog extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function users()
    {
        return $this->hasMany(User::class,'id','user_id');
    }

    public function productRating()
    {
        return $this->belongsTo(ProductRating::class,'product_rating_id','id');
    }
}
