<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutRetilgram extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table='about_retilgrams';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
