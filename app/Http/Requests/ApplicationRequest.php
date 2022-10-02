<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'client_comment' => 'required|string|max:1000',
            'appartment_id'=>'required|exists:appartments,id'
        ];
    }
}
