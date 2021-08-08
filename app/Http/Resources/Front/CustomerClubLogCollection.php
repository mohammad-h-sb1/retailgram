<?php

namespace App\Http\Resources\Front;

use App\Http\Resources\Admin\CustomerClubCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CustomerClubLogCollection extends JsonResource
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
            'CustomerClub'=>$this->customerClubs,
            'user_rating'=>$this->user_rating
        ];
    }
}
