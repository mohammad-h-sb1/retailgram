<?php

namespace App\Http\Resources\Admin;

use App\Models\AboutRetilgram;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AboutRetilgramCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request):array
    {

        return[
            'user_id'=>new UserCollection($this->user),
            'work_retilgrams'=>$this->work_retilgrams,
            'blog_retilgrams'=>$this->blog_retilgrams,
            'about_retilgrams'=>$this->about_retilgrams,
            'training_and_guidance'=>$this->training_and_guidance,
            'about_order_registration'=>$this->about_order_registration,
            'about_send_product'=>$this->about_send_product,
            'about_payment'=>$this->about_payment,
            'product_return'=>$this->product_return,
            'terms_of_use'=>$this->terms_of_use,
            'privacy'=>$this->privacy,
            'bug'=>$this->bug
        ];
    }
}
