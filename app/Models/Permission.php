<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function permissionLogs()
    {
        return $this->hasMany(PermissionLog::class,'permission_id','id');
    }

    public function user()
    {
        return $this->belongsToMany(User::class,'permission_logs');
    }
}
