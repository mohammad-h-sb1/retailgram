<?php

namespace App\Http\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;

class CommentStore extends FormRequest
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
            'user_id'=>['require','string','max:255'],
            'product_id'=>['require','string','max:255'],
            'description'=>['require','text',],
            'weakness'=>['require','string','max:255'],
            'power'=>['require','string','max:255'],
        ];
    }
}
