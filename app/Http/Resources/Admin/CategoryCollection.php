<?php

namespace App\Http\Resources\Admin;

use App\Models\Category;
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
            'user'=>new UserCollection($this->user),
            'parent'=>new CategoryCollection($this->parent),
            'name'=>$this->name,
            'description'=>$this->description,
            'created_at'=>(string) $this->created_at
        ];
    }
}
