<?php

namespace App\Http\Requests;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class AddAccessoryRequest extends FormRequest
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
            'accessory_name'=>'required',
            'accessory_code'=>'required|unique:accessories,code',
            'price'=>'required|integer',
            'catagories'=>'required',
            'discount'=>'required|integer',
            'accessory_images' => 'required',
            'accessory_images.*' => 'image|mimes:jpg,jpeg,png,JPG,JPEG,PNG',
            'description'=>'required',
            'short_description'=>'required|max:300',
            'weight'=>'required',
            'dimensions'=>'required',
            'length'=>'required',

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
