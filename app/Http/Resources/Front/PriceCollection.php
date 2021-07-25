<?php

namespace App\Http\Resources\Front;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PriceCollection extends JsonResource
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
            'count'=>$this->count,
            'Price'=>$this->products->sum('price_product') * $this->sum('count'),
            'discount_product'=>$this->products,
            'created_at'=>(string)$this->created_at,
        ];
    }
}
