<?php

namespace App\Http\Requests\ProductRating;

use Illuminate\Foundation\Http\FormRequest;

class ProductRatingStore extends FormRequest
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
            'user_id'=>['required',],
            'product_id'=>['required',],
            'material_quality'=>['integer','min:1','max:2'],
            'sewingـquality'=>['integer','min:2','max:2'],
            'clothـdesign'=>['integer','min:1','max:2'],
            'clothing'=>['integer','min:1','max:2'],
            'worth_buying'=>['integer','min:1','max:2'],
        ];
    }
}
