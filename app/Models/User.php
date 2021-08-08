<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Hekmatinasser\Verta\Verta;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    const TYPE_ADMIN='admin';
    const TYPE_MANAGER='manager';
    const TYPE_ADMIN_CENTER='admin_center';
    const TYPE_INFLUENSER='influenser';
    const TYPE_CUSTOMER='customer';
    const TYPE_STYLIST='stylist';
    const TYPE_USER='user';
    const TYPE_GUEST='guest';
    const TYPE_SHOP='shop';
    const TYPES=[self::TYPE_ADMIN,self::TYPE_MANAGER,self::TYPE_ADMIN_CENTER, self::TYPE_INFLUENSER,
        self::TYPE_STYLIST,self::TYPE_GUEST,self::TYPE_CUSTOMER,self::TYPE_USER,self::TYPE_SHOP];
    const GENDER_MAN='gender_mane';
    const GENDER_WOMAN='gender_woman';
    const GENDER=[self::GENDER_WOMAN,self::GENDER_MAN];
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'mobile',
        'gender',
        'rating',
        'api_token',
        'customer_id',
        'city_id',
        'province_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'api_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function centerShop()
    {
        return $this->hasOne(CenterShop::class);
    }

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class,);
    }
    public function productsSold()
    {
        return $this->hasMany(ProductSold::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    public function data()
    {
        return $this->hasMany(Data::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function discounts()
    {
        return $this->hasMany(Discount::class);
    }

    public function userRating()
    {
        return $this->hasOne(UserRating::class);
    }

    public function customerClub()
    {
        return $this->belongsTo(CustomerClub::class);
    }
    public function aboutRetilgam()
    {
        return $this->hasMany(AboutRetilgram::class);
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function getJalaly()
    {
        return verta($this->created_at)->format('Y/m/d');
    }

    public function influencer()
    {
        return $this->hasMany(Influencer::class,);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function sizes()
    {
        return $this->hasMany(Size::class);
    }

    public function colors()
    {
        return $this->hasMany(Color::class);
    }

    public function productRatings()
    {
        return $this->hasMany(ProductRating::class,'user_id','id');
    }

    public function userLevel()
    {
        if (auth()->user()->rating >= 100 ){

            return auth()->user()->reting === 'golden_level';
        }
        elseif (auth()->user()->rating  <= 75)
        {

            return auth()->user()->reting === 'silver_level';
        }
        elseif(auth()->user()->rating  <= 50 ){

            return auth()->user()->reting === 'bronze_level';
        }
        else{

            return auth()->user()->reting === 'normal_leve';
        }

    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function stylists()
    {
        return $this->hasMany(Stylist::class);
    }

    public function FavoriteList()
    {
        return $this->belongsTo(FavoriteList::class,'id','user_id');
    }

    public function ProductRatingLogs()
    {
        return $this->belongsTo(ProductRatingLog::class,'id','user_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'permission_logs');
    }

    public function hasPermission($permission)
    {
        return $this->permissions->contains('code',$permission);
    }

    public function commentLike()
    {
        return $this->hasMany(CommentLike::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class,'city_id','id');
    }

    public function provinces()
    {
        return $this->belongsTo(Province::class,'province_id','id');
    }

    public function managers()
    {
        return $this->hasMany(Manager::class);
    }
//    public function permissionsLogs()
//    {
//        return $this->hasMany(PermissionLog::class,'user_id','id');
//    }

    public function customerClubLog()
    {
        return $this->belongsTo(CustomerClubLog::class);
    }

}
