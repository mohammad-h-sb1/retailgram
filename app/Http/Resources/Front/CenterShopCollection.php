<?php

namespace App\Http\Resources\Front;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CenterShopCollection extends JsonResource
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
            'name'=>$this->name,
            'central_address'=>$this->central_address,
            'central_phone'=>$this->central_phone,
            'description'=>$this->description,
            'images'=>ImageCollection::collection($this->images),
            'created_at'=>(string)$this->created_at
        ];
    }
}
