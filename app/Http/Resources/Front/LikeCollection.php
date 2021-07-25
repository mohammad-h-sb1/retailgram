<?php

namespace App\Http\Resources\Front;

use App\Http\Resources\Admin\ProfileCollection;
use App\Http\Resources\Admin\UserCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class LikeCollection extends JsonResource
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
            'user'=>new UserCollection($this->user),
            'product'=>new  ProfileCollection($this->product)
        ];
    }
}
