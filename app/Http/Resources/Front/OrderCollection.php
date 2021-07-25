<?php

namespace App\Http\Resources\Front;

use App\Http\Resources\Admin\DiscountCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class OrderCollection extends JsonResource
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
            'discount'=>new DiscountCollection($this->discount),
            'product_amount'=>$this->product_amount,
            'product_quantity_with_discount'=>$this->product_quantity_with_discount,
            'status'=>$this->status,
            'created_at'=>(string)$this->created_at

        ];
    }
}
