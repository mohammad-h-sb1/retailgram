<?php

namespace App\Http\Resources\Admin;

use App\Models\Color;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ColorCollection extends JsonResource
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
            'user_id'=>new UserCollection($this->user),
            'tag_id'=>new TagCollection($this->tag),
            'code'=>$this->code,
            'name'=>$this->name,
        ];
    }
}
