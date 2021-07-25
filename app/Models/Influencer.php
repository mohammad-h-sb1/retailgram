<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Influencer extends Model
{
    use HasFactory;
    protected $guarded=[];
     protected $table='influencers';

    public function user()
    {
        return $this->belongsTo(User::class,);
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class,);

    }
}
