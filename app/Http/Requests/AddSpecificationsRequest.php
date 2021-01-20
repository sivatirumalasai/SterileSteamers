<?php

namespace App\Http\Requests;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class AddSpecificationsRequest extends FormRequest
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
            'category'=>'required',
            'info'=>'required',
            'power'=>'required',
            'voltage'=>'required',
            'current'=>'required',
            'heater_count'=>'required',
            'steam_capacity'=>'required',
            'flow_rate'=>'required',
            'approximate'=>'required',
            'operating_pressure'=>'required',
            'maximum_pressure'=>'required',
            'boiler_vessel_capacity'=>'required',
            'boiler_temperature'=>'required',
            'sprayer_tip_temperature'=>'required',
            'steam_temperature_sprayed'=>'required',
            'preheating_time'=>'required',
            'water_tank_capacity'=>'required',
            'fuel_tank_capacity'=>'required',
            'fuel_consumption'=>'required',
            'steam_hose_connections'=>'required',
            'guns_included'=>'required',
            'direct_water_connection'=>'required',
            'product_dimensions'=>'required',
            'product_weight'=>'required',
            'freight_dimensions'=>'required',
            'body_materials'=>'required',
            'colors_available'=>'required',
            

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
