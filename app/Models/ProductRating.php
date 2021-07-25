<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRating extends Model
{
    protected $guarded=[];

    public function product()
    {
        return $this->belongsTo(Product::class,);
    }

    public function ProductRatingLogs()
    {
        return $this->hasMany(ProductRatingLog::class,);
    }

}
