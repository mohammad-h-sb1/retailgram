<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{

    use HasFactory;
    const LIKE_COMMENT='like_comment';
    const DISLIKE_COMMENT='like_comment' ;
    const EMPTY='empty';
    const COMMENT=[self::LIKE_COMMENT,self::DISLIKE_COMMENT,self::EMPTY];

    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class,);

    }

}
