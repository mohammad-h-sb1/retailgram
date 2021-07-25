<?php

namespace App\Http\Resources\Front\Discount;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DiscountCollection extends JsonResource
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
            'code'=>$this->code,
            'discount_percent'=>$this->discount_percent,
            'amount_of_discount'=>$this->amount_of_discount,
            'code_validity'=>$this->code_validity,
            'created_at'=>(string)$this->created_at
        ];
    }
}
