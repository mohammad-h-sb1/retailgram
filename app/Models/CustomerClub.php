<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerClub extends Model
{


    use HasFactory;
    protected $guarded=[];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function golden_level()
    {
        return $this->lavel=== self::GOLDEN_LEVEL;
    }
    public function silver_level()
    {
        return $this->lavel== self::SILVER_LEVEL ;
    }
    public function bronze_level()
    {
        return $this->lavel== self::BRONZE_LEVEL;
    }
    public function normal_level()
    {
        return $this->lavel== self::NORMAL_LEVEL;
    }
}
