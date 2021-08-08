<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Front\PropertyCollection;
use App\Models\Tag;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TagCollection extends JsonResource
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
//            'properties'=>new PropertyCollection($this->property),
            'sizes'=>SizeCollection::collection($this->sizes),
            'product'=>new \App\Http\Resources\Front\ProductCollection($this->product),
            'attributes'=>$this->attributes,
            'created_at'=>(string)$this->created_at

        ];
    }
}
