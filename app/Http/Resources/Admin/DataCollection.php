<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Front\ManagerCollection;
use App\Models\Data;
use App\Models\Manager;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DataCollection extends JsonResource
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
            'manager'=>$this->manager,
            'telegram'=>$this->telegram,
            'instagram'=>$this->instagram,
            'whatsapp'=>$this->whatsapp,
            'phone'=>$this->phone,
            'mobile'=>$this->mobile,
            'address'=>$this->address,
            'created_at'=>(string) $this->created_at
            ];
    }
}
