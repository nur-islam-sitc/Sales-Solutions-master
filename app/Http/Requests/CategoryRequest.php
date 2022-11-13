<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Request;

class CategoryRequest extends FormRequest
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

        if(Request::route()->getName === "client.categories.store"){
            return [
                'name' => 'required|string|max:255',
                'parent_id' => 'nullable|integer',
                'status' => 'required|integer'
            ];
        }

        if(Request::route()->getName === "client.products.update"){
            return [
                'name' => 'required|string|max:255',
                'parent_id' => 'nullable|integer',
                'status' => 'required|integer'
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
