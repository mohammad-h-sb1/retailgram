<?php

namespace App\Http\Resources\Front;

use App\Http\Resources\Admin\TagCollection;
use App\Http\Resources\Admin\UserCollection;
use App\Models\Cart;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CartCollection extends JsonResource
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
            'product'=>\App\Http\Resources\Front\Product\ProductCollection::collection($this->products),
            'user'=>new UserCollection($this->user),
            'tag'=>TagCollection::collection($this->tags),
            'count'=>$this->count,
            'created_at'=>(string)$this->created_at,
            'payment'=> $this->products->sum('price_product') * $this->count,
        ];
    }
}
