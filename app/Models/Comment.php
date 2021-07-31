<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    use HasFactory;
    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);

    }

    public function parentId()
    {
        return $this->belongsTo(Comment::class,'parent_id','id');
    }

    public function commentLikes()
    {
        return $this->hasMany(CommentLike::class);
    }
}
