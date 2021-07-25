<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StylistProduct extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function stylist()
    {
        return $this->belongsTo(Stylist::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
