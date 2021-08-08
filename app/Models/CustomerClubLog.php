<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerClubLog extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function customerClubs()
    {
        return $this->hasMany(CustomerClub::class,'id','customer_club_id');
    }
}
