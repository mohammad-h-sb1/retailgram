<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentLog extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function users()
    {
        return $this->hasMany(User::class,'id','user_id');
    }
    public function payments()
    {
        return $this->hasMany(Payment::class,'id','payment_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class,'id' , 'product_id');
    }

    public function discounts()
    {
        return $this->hasMany(Discount::class,'id','discounts');
    }

    public function tags()
    {
        return $this->hasMany(Tag::class,'id','tag_id');
    }
}
