<?php

namespace App\Http\Resources\Admin;

use App\Models\Comment;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CommentCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'user_id'=>new UserCollection($this->user),
            'product_id'=>new ProductCollection($this->product),
            'description'=>$this->description,
            'power'=>$this->power,
            'weakness'=>$this->weakness,
            'status'=>$this->status,
            'created_at'=>(string)$this->created_at,
        ];
    }
}
