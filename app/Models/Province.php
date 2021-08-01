<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table='provinces';
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function productSolds()
    {
        return $this->hasMany(ProductSold::class);
    }
}
