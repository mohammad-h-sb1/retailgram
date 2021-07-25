<?php

namespace App\Http\Requests\Discount;

use Illuminate\Foundation\Http\FormRequest;

class DiscountStore extends FormRequest
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
            'user_id'=>['required','string','max:255'],
            'category_id'=>['string','max:255'],
            'protect_id'=>['string','max:255'],
            'code'=>['require','string','max:255'],
            'discount_percent'=>['string','max:255'],
            'amount_of_discount'=>['string','max:255'],
            'code_validity'=>['required']
        ];
    }
}
