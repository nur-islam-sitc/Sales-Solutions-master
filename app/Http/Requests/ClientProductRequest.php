<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ClientProductRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id' => 'required|integer',
            'user_id' => 'required|integer',
            'shop_id' => 'required|integer',
            'product_name' => 'required|string',
            'price' => 'required|integer',
            'discount' => 'required|integer',
            'size' => 'required|string',
            'color' => 'required|string',
            'short_description' => 'required|string',
            'long_description' => 'required|string',
            'meta_tag' => 'required|string',
            'meta_description' => 'required|string',
            'status' => 'required|boolean',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new   HttpResponseException(response()->json(
            [
                'success' => false,
                'msg'  => 'Validations Error',
                'data' => $validator->errors(),
            ], 400));
    }
}
