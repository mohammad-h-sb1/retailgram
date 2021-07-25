<?php

namespace App\Http\Resources\Front;

use App\Http\Resources\Admin\SizeCollection;
use App\Http\Resources\Admin\UserCollection;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SizeLogCollection extends JsonResource
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
//            'user'=>UserCollection::collection($this->users),
            'size'=>$this->size,
        ];
    }
}
