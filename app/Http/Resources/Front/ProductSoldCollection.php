<?php

namespace App\Http\Resources\Front;

use App\Http\Resources\Admin\UserCollection;
use App\Models\ProductSold;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductSoldCollection extends JsonResource
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
            'center_shop'=>new CenterShopCollection($this->centerShop),
            'product_id'=>new \App\Http\Resources\Front\Product\ProductCollection($this->product),
            'count'=>$this->count,
            'customer_address'=>$this->customer_address,
            'created_at'=>(string)$this->created_at


        ];
    }
}
