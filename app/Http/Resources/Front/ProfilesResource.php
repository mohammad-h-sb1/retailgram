<?php

namespace App\Http\Resources\Front;

use App\Http\Resources\Admin\UserCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfilesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'user_id'=>new UserCollection($this->id),
            'description'=>$this->description,
            'address'=>$this->address,
            'created_at'=>(string)$this->created_at,
            'updated_at' =>(string) $this->updated_at,
        ];
    }
}
