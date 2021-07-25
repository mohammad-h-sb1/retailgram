<?php

namespace App\Http\Requests\CenterShop;

use Illuminate\Foundation\Http\FormRequest;

class CenterShopStore extends FormRequest
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
            'name'=>['required','string','max:255'],
            'central_address'=>['required','string'],
            'central_phone'=>['required','string','max:9','min:7'],
        ];
    }
}
