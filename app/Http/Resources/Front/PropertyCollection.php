<?php

namespace App\Http\Resources\Front;

use App\Http\Resources\Admin\TagCollection;
use App\Http\Resources\Admin\UserCollection;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PropertyCollection extends JsonResource
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
//            'user'=>new UserCollection($this->user_id),
//            'tag'=>new TagCollection($this->tag),
            'name'=>$this->name_color,
            'code'=>$this->code_color,

        ];
    }
}
