<?php

namespace App\Http\Requests\CenterShop;

use Illuminate\Foundation\Http\FormRequest;

class CenterShopUpdate extends FormRequest
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
//            'name'=>['require','string','max:255'],
            'center_address'=>['require','string'],
            'center_phone'=>['require','string','max:9','min:7'],
        ];
    }
}
