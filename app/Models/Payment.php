<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function cart()
    {
        return $this->belongsTo(Cart::class,);
    }

    public function paymentLog()
    {
        return $this->belongsTo(PaymentLog::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class,'id','product_id');
    }

    public function discounts()
    {
        return $this->hasMany(Discount::class,);
    }
}
