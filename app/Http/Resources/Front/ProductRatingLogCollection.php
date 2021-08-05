<?php

namespace App\Http\Resources\Front;

use App\Http\Resources\Admin\UserCollection;
use App\Models\ProductRating;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductRatingLogCollection extends JsonResource
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
            'product_rating_id'=>new ProductRatingCollection($this->productRating),
            'rating'=>$this->rating
        ];
    }
}
