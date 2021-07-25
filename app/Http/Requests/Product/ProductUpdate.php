<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdate extends FormRequest
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
            'center_shop_id'=>['required','string','max:255'],
            'category_id'=>['required','string','max:255'],
            'name'=>['required','string','max:255'],
            'slug'=>['required','string','max:255'],
            'gender'=>['required'],
            'description'=>['required','string','max:255'],
            'price_product'=>['required','string','max:255'],
            'discount-product'=>['string','max:255']
        ];
    }
}
