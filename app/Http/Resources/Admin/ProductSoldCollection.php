<?php

namespace App\Http\Resources\Admin;

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
        return [
            'center_shop'=>new CenterShopCollection($this->centerShop),
            'product_id'=>new \App\Http\Resources\Front\Product\ProductCollection($this->Product),
            'count'=>$this->count,
            'customer_address'=>$this->customer_address,
            'status'=>$this->status,
            'created_at'=>(string)$this->created_at

        ];
    }
}
