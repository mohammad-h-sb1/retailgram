<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Front\SizeLogCollection;
use App\Models\Size;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SizeCollection extends JsonResource
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
            'title'=>$this->title,
            'sizeLog'=>SizeLogCollection::collection($this->SizeLogs),

            'created_at'=>(string)$this->created_at
        ];
    }
}
