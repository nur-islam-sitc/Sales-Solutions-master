<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class MerchantSettingRequest extends FormRequest
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
        if(\Request::route()->getName() === "client.settings.update.merchant.info"){
            return [
                'short_address' => 'required|string|max:255',
                'address' => 'nullable|string|max:255',
                'fb_page' => 'required|string|max:255',
                'short_description' => 'required|string|max:255',
                'description' => 'nullable|string',
                'brand_color' => 'nullable|string|max:255',
                'brand_border_color' => 'nullable|string|max:255',
            ];
        }
        return [];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            "success"=>false,
            "errors"=>$validator->errors(),
            "msg"=>$validator->messages("*")->first()
        ], 400));
    }
}
