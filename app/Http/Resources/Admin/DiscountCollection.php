<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Front\InfluencerCollection;
use App\Models\Discount;
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
        return[
//            'user_id'=>new UserCollection($this->user),
//            'category'=>CategoryCollection::collection($this->categories),
//            'protect_id'=>new ProductCollection($this->product),
            'code'=>$this->code,
            'discount_percent'=>$this->discount_percent,
            'amount_of_discount'=>$this->amount_of_discount,
            'code_validity'=>$this->code_validity,
            'influencers'=>$this->influencers_id,
            'created_at'=>(string)$this->created_at

        ];
    }
}
