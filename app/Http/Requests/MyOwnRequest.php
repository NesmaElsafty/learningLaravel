<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MyOwnRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'name_ar'=>'required',
            'name_en'=>'required',
            'description_ar'=>'required',
            'description_en'=>'required',
            'price'=>'required',
            "image" => "nullable",
            "expired_date" => "nullable"

        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            "name_ar.required" => "Please write an arabic name",
            "name_en.required" => "Please write an english name",
            "description_ar.required" => "Please write an arabic description",
            "description_en.required" => "Please write an english description",
            "price.required" => "Please write the price"
            
        ];
    }

    // public function withValidator($validator)
    //     {
    //         $validator->after(function ($validator) {
    //             if ($this->somethingElseIsInvalid()) {
    //                 $validator->errors()->add('name_ar', 'Something is wrong with this field!');
    //             }
    //         });
    //     }
}
