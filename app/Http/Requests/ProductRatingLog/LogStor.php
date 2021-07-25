<?php

namespace App\Http\Requests\ProductRatingLog;

use Illuminate\Foundation\Http\FormRequest;

class LogStor extends FormRequest
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
            'product_rating_id'=>['required',],
            'rating'=>['integer','min:1','max:10'],
        ];
    }
}
