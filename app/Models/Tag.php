<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function product()
    {
        return $this->belongsTo(product::class);
    }

    public function sizes()
    {
        return $this->hasMany(Size::class,'id','Size_id');
    }

    public function colors()
    {
        return $this->hasMany(Color::class);
    }

    public function property()
    {
        return $this->hasOne(Property::class);
    }
}
