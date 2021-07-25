<?php

namespace App\Http\Resources\Admin;

use App\Enums\CustomerClubLevel;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request):array
    {
//        dd($this->name);
        return[
//            'customer'=>new CustomerClubLevel($this->customer),
            'name'=>$this->name,
            'mobile'=>$this->mobile,
            'email'=>$this->email,
            'type'=>$this->type,
            'gender'=>$this->gender,
            'rating'=>$this->rating,
            'api_token'=>$this->api_token,
            'created_at'=>(string)$this->created_at

        ];
    }
}
