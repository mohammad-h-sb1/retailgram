<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductShopCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'product'=>new ProductCollection($this->product),
            'shop'=>new ShopCollection($this->shop),
            'count'=>$this->count,
            'created_at'=>(string)$this->created_at
        ];
    }
}
