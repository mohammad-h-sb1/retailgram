<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentLike extends Model
{
    use HasFactory;
    protected $guarded=[];

    const COMMENT_LIKE='comment_like';
    const COMMENT_DISLIKE='comment_dislike';
    const COMMENT=[self::COMMENT_LIKE,self::COMMENT_DISLIKE];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
