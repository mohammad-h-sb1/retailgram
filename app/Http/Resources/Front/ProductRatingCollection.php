<?php

namespace App\Http\Resources\Front;

use App\Http\Resources\Admin\UserCollection;
use App\Models\Product;
use App\Models\ProductRating;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductRatingCollection extends JsonResource
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
            'title'=>$this->title,
            'product'=>new ProductCollection($this->product),
            'create_at'=>(string)$this->created_at
        ];
    }
}
