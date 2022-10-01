<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FlatRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'house_number' => 'required|string|max:255',
            'floor' => 'required|numeric',
            'appartment_number' => 'required|integer|max:32000',
            'number_of_rooms' => 'required|integer|max:128',
            'apartment_area' => 'required|numeric',
            'living_space' => 'required|numeric',
            'price' => 'required|min:0|numeric',
            'currency' => 'required|string|max:255',
        ];
    }
}
