<?php

namespace App\Http\Resources\Front;

use App\Http\Controllers\Front\StylistProductController;
use App\Http\Resources\Admin\ProductRatingCollection;
use App\Http\Resources\Admin\SizeCollection;
use App\Models\CenterShop;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

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
            'center_id'=>new CenterShopCollection($this->centerShop),
            'category_id'=>new CategoryCollection($this->category),
            'productRating'=>ProductRatingCollection::collection($this->productRatings),
            'size'=>SizeCollection::collection($this->sizes),
            'name'=>$this->name,
            'slug'=>$this->slug,
            'gender'=>$this->gender,
            'description'=>$this->description,
            'price_product'	=>$this->price_product,
            'discount_product'=>$this->discount_product,
            'created_at'=>(string)$this->created_at,
            'img'=>ImageCollection::collection($this->images),
            'stylistProduct'=>StyListProductCollection::collection($this->StylistProduct)
        ];
    }
}
