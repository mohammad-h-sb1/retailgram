<?php

namespace App\Http\Resources\Front;

use App\Models\Stylist;
use App\Models\StylistProduct;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class StyListProductCollection extends JsonResource
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
//            'product'=>$this->product,
            'description'=>$this->description,

        ];
    }
}
