<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Request;

class OrderRequest extends FormRequest
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
        if(Request::route()->getName() === "client.orders.store"){
            return [
                'customer_name' => 'required|string|max:255',
                'customer_phone' => 'required|string|max:255',
                'customer_address' => 'required|string|max:255',
                'product_id' => 'required|array|min:1',
                'product_id.*' => 'required|integer|distinct|min:1',
                'product_qty' => 'required|array|min:1',
            ];
        }

        if(Request::route()->getName() === "client.orders.update"){
            return [
                'customer_name' => 'required|string|max:255',
                'customer_phone' => 'required|string|max:255',
                'customer_address' => 'required|string|max:255',
                'product_id' => 'required|array|min:1',
                'product_id.*' => 'required|integer|distinct|min:1',
                'product_qty' => 'required|array|min:1',
            ];
        }
        return [];
    }

    public function failedValidation(Validator $validator)
    {
        throw new   HttpResponseException(response()->json(
            [
                'success' => false,
                'msg'  => $validator->errors(),
            ], 400));
    }
}
