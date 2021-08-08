<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Front\ProductRatingLogCollection;
use App\Models\PaymentLog;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PaymentLogCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return array(
//            'user_id'=>UserCollection::collection($this->users),
            'payment'=>PaymentCollection::collection($this->payments),
            'product'=>\App\Http\Resources\Front\Product\ProductCollection::collection($this->products),
//            'discount'=>DiscountCollection::collection($this->discounts),
            'tag'=>TagCollection::collection($this->tags),
            'status'=>$this->status,

        );
    }
}
