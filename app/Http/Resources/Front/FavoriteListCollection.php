<?php

namespace App\Http\Resources\Front;

use App\Http\Resources\Admin\UserCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class FavoriteListCollection extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'user'=>UserCollection::collection($this->users),
            'product'=>\App\Http\Resources\Front\Product\ProductCollection::collection($this->products),
            'categories'=>CategoryCollection::collection($this->categories)
        ];
    }
}
