<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerClub extends Model
{


    use HasFactory;
    protected $guarded=[];
    const GOLDEN_LEVEL='golden_level'> 150 ;
    const SILVER_LEVEL='silver_level'> 100 ;
    const BRONZE_LEVEL='bronze_level'> 50 ;
    const NORMAL_LEVEL='normal_level'> 25 ;
    const LEVEL=[self::GOLDEN_LEVEL,self::SILVER_LEVEL,self::BRONZE_LEVEL,self::NORMAL_LEVEL];


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

    public function CustomerClubLog()
    {
        return $this->belongsTo(CustomerClubLog::class,);
    }
}
