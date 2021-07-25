<?php

namespace App\Http\Resources\Front;

use App\Http\Resources\Admin\DiscountCollection;
use App\Http\Resources\Admin\UserCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class InfluencerCollection extends JsonResource
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
            'user'=>new UserCollection($this->user)
        ];
    }
}
