<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Request;

class ProductRequest extends FormRequest
{
     /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        if(Request::route()->getName() === "client.products.store"){
            return [
                'category_id' => 'required|integer',
                'product_name' => 'required|string',
                'price' => 'required|integer',
                'discount' => 'required|integer',
                'size' => 'required|string',
                'color' => 'required|string',
                'short_description' => 'required|string',
                'long_description' => 'required|string',
                'main_image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
                'other_image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
                'meta_tag' => 'required|string',
                'meta_description' => 'required|string',
                'status' => 'required|boolean',
            ];
        }

        if(Request::route()->getName() === "client.products.update"){
            return [
                'category_id' => 'required|integer',
                'product_name' => 'required|string',
                'price' => 'required|integer',
                'discount' => 'required|integer',
                'size' => 'required|string',
                'color' => 'required|string',
                'short_description' => 'required|string',
                'long_description' => 'required|string',
                'main_image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
                'other_image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
                'meta_tag' => 'required|string',
                'meta_description' => 'required|string',
                'status' => 'required|boolean',
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
