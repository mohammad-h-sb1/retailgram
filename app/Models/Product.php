<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use Sluggable;
    use HasFactory;
    protected $guarded=[];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productSolds()
    {
        return $this->hasMany(ProductSold::class);
    }

    public function comments()
    {
        return$this->hasMany(Comment::class,'product_id','id');
    }

    public function productRatings()
    {
        return $this->hasMany(ProductRating::class,'product_id','id');
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    public function discounts()
    {
        return $this->hasMany(Discount::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getJalaly()
    {
        return verta($this->created_at)->format('Y/m/d');
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function stylist()
    {
        return $this->belongsToMany(Stylist::class,'product_stylist','product_id','stylist_id');
    }

    public function centerShop()
    {
        return $this->belongsTo(CenterShop::class,);
     }

    public function user()
    {
        return $this->belongsTo(User::class);
     }

    public function likes()
    {
        return $this->hasMany(Like::class);
     }

    public function images()
    {
        return $this->hasMany(Image::class,'product_id','id');
     }

    public function StylistProduct()
    {
        return $this->hasMany(StylistProduct::class,);
    }

    public function ProductShops()
    {
        return $this->hasMany(ProductShop::class);
    }

    public function FavoriteList()
    {
        return $this->belongsTo(FavoriteList::class,);
    }

    public function sizes()
    {
        return $this->hasMany(Size::class,);
    }

    public function userRating()
    {
        return $this->belongsTo(UserRating::class , 'product_id','id');
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function paymentLog()
    {
        return $this->belongsTo(PaymentLog::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

}
