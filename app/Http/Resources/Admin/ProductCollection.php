<?php

namespace App\Http\Resources\Admin;

use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use function Symfony\Component\Translation\t;

class ProductCollection extends JsonResource
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
//            'user'=>new UserCollection($this->user),
            'center_shop'=>new CenterShopCollection($this->centerShop),
            'category'=>new CategoryCollection($this->category),
            'productRating'=>ProductRatingCollection::collection($this->productRatings),
            'name'=>$this->name,
            'slug'=>$this->slug,
            'gender'=>$this->gender,
            'description'=>$this->description,
            'price_product'=>$this->price_product,
//            'discount-product'=>$this->discount-product,
            'status'=>$this->status,
            'rating'=>$this->rating,
            'created_at'=>(string)$this->created_at

        ];
    }
}
