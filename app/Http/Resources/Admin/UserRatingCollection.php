<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserRatingCollection extends JsonResource
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
            'product'=>\App\Http\Resources\Front\ProductCollection::collection($this->products),
//            'cart'=>$this->carts->sum('count'),
//            'rating'=>$this->products->sum('rating') * $this->carts->sum('count')
             'rating'=>$this->rating
        ];
    }
}
