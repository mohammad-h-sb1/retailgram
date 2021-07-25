<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Front\CartCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PaymentCollection extends JsonResource
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
            'status'=>$this->status,
            'product'=>ProductCollection::collection($this->products),
            'amount'=>$this->amount,
            'discount_id'=>$this->discount_id

        ];
    }
}
