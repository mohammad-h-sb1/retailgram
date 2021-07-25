<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Front\ProductRatingLogCollection;
use App\Models\ProductRating;
use App\Models\ProductRatingLog;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductRatingCollection extends JsonResource
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
//            'productLog'=>ProductRatingLogCollection::collection($this->ProductRatingLogs),
            'productLog'=>$this->ProductRatingLogs->avg('rating'),
            'create_at'=>(string)$this->created_at
        ];
    }
}
