<?php

namespace App\Http\Resources\Admin;

use App\Models\Question;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AnswerCollection extends JsonResource
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
            'question'=>$this->question,
            'created_at'=>jdate($this->created_at)->format('datetime')

        ];
    }
}
