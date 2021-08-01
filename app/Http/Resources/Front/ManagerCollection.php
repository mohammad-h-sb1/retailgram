<?php

namespace App\Http\Resources\Front;

use App\Http\Controllers\v1\Admin\UserController;
use App\Http\Resources\Admin\UserCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ManagerCollection extends JsonResource
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
            'name'=>$this->name
        ];
    }
}
