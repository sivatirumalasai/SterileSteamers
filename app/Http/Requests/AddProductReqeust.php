<?php

namespace App\Http\Requests;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class AddProductReqeust extends FormRequest
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
            'product_name'=>'required',
            'code'=>'required|unique:products,code',
            'price'=>'required|integer',
            'discount'=>'required|integer',
            'product_images' => 'required',
            'product_images.*' => 'image|mimes:jpg,jpeg,png,JPG,JPEG,PNG',
            'description'=>'required',
            'short_description'=>'required|max:300'

        ];
    }
    public function withValidator($validator)
    {
        $messages = $validator->messages();

        foreach ($messages->all() as $message)
        {
            toastr()->error ( $message, 'Error');
        }

        return $validator->errors()->all();

    }
}
