<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class OrderStore extends FormRequest
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
            'discount_id'=>['required',],
            'product_amount'=>['required',],
            'product_quantity_with_discount'=>['required',],
        ];
    }
}
