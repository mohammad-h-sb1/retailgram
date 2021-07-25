<?php

namespace App\Http\Resources\Front\Product;

use App\Http\Resources\Front\CategoryCollection;
use App\Http\Resources\Front\CenterShopCollection;
use App\Http\Resources\Front\ImageCollection;
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

    //این فیل برای اینکه  در sold product نیاز به کامنت ها نداریدم
    public function toArray($request)
    {
        return[
            'category_id'=>new CategoryCollection($this->category),
            'name'=>$this->name,
            'slug'=>$this->slug,
            'gender'=>$this->gender,
            'description'=>$this->description,
            'price_product'	=>$this->price_product,
            'discount_product'=>$this->discount_product,
            'created_at'=>(string)$request->created_at,

        ];
    }
}
