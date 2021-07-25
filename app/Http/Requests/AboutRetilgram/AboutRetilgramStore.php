<?php

namespace App\Http\Requests\AboutRetilgram;

use Illuminate\Foundation\Http\FormRequest;

class AboutRetilgramStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
//            'user_id'=>['required',],
            'work_retilgrams'=>['string','max:255'],
            'blog_retilgrams'=>['string','max:255'],
            'about_retilgrams'=>['string','max:255'],
            'training_and_guidance'=>['string','max:255'],
            'about_order_registration'=>['string','max:255'],
            'about_send_product'=>['string','max:255'],
            'about_payment'=>['string','max:255'],
            'product_return'=>['string','max:255'],
            'terms_of_use'=>['string','max:255'],
            'privacy'=>['string','max:255'],
            'bug'=>['string','max:255'],

        ];
    }
}
