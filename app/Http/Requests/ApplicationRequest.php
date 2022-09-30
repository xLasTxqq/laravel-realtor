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
            'fullname' => 'required|string',
            'number' => 'required|string',
            'dateapplication' => 'required|date',
            'numberhouse' => 'required|integer',
            'numberflat' => 'required|integer',
            'comment1' => 'required|string',
            'status' => 'required|string',
            'datemeeting' => ['required_if:status,Processed','nullable','date'],
            'comment2' => ['required_if:status,Processed','nullable','string'],
        ];
    }
}
