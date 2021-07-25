<?php

namespace App\Http\Resources\Admin;

use App\Models\Shop;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ShopCollection extends JsonResource
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
            'user'=>new UserCollection($this->user),
            'centerShop'=>new CenterShopCollection($this->centerShop),
            'name'=>$this->name,
            'address'=>$this->shop_address,
            'phone'=>$this->shop_phone,
            'status'=>$this->status,
            'created_at'=>(string)$this->created_at

        ];
    }
}
