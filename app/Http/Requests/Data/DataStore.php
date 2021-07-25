<?php

namespace App\Http\Requests\Data;

use Illuminate\Foundation\Http\FormRequest;

class DataStore extends FormRequest
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
//            'user_id'=>['required','string','max:255'],
            'telegram'=>['string','max:255'],
            'instagram'=>['string','max:255'],
            'whatsapp'=>['string','max:255'],
            'phone'=>['string','max:10'],
            'mobile'=>['string','max:11'],
            'address'=>['string','max:255'],

        ];
    }
}
