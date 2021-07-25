<?php

namespace App\Http\Resources\Front;

use App\Http\Resources\Admin\UserCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryCollection extends JsonResource
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
            'name'=>$this->name,
            'description'=>$this->description,
            'created_at'=>(string)$this->created_at,
            'img'=>ImageCollection::collection($this->images),

        ];
    }
}
