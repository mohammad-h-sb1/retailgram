<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SizeLog extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function users()
    {
        return $this->hasMany(User::class,'id','user_id');
    }

    public function size()
    {
        return $this->belongsTo(Size::class,'id','size_id');
    }
}
