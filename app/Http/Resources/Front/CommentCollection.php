<?php

namespace App\Http\Resources\Front;

use App\Http\Resources\Admin\ColorCollection;
use App\Http\Resources\Admin\UserCollection;
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
            'user'=>new UserCollection($this->user),
            'parent'=>new CommentCollection($this->parentId),
            'description'=>$this->description,
            'power'=>$this->powe,
            'weakness'=>$this->weakness,
            'created_at'=>(string)$this->created_at

        ];
    }
}
