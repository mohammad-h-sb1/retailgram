<?php

namespace App\Http\Requests\ProductSold;

use Illuminate\Foundation\Http\FormRequest;

class ProductSoldStore extends FormRequest
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
            'center_shop_id'=>['required',],
            'product_id'=>['required',],
            'customer_address'=>['required',],
        ];
    }
}
