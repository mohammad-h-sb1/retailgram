<?php

namespace App\Http\Resources\Front;

use App\Http\Controllers\Front\UserRatingController;
use App\Http\Resources\Admin\UserRatingCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserRatingLogCollection extends JsonResource
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
            'userRating'=>UserRatingCollection::collection($this->userRatings),
            'cart'=>CartCollection::collection($this->carts),
            'rating'=>$this->carts->sum('count') * $this->userRatings->sum('rating')
        ];
    }
}
