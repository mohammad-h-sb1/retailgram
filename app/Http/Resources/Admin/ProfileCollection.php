<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Front\ImageCollection;
use App\Models\Profile;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProfileCollection extends JsonResource
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
            'user_id'=>new UserCollection($this->user),
            'description'=>$this->description,
            'address'=>$this->address,
            'created_at'=>(string)$this->created_at,
            'birth'=>$request->birth,
            'img'=>ImageCollection::collection($this->images)
        ];
    }
}
