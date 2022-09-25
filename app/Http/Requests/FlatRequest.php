<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FlatRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'numberhouse' => 'required|integer',
            'floor' => 'required|integer',
            'numberflat' => 'required|integer',
            'rooms' => 'required|integer',
            'area' => 'required|numeric',
            'livingspace' => 'required|numeric',
            'cost' => ['required','min:0','numeric'],
            'status' => 'required|string',
            'booked' => ['required_if:status,Booked','nullable','date'],
            'purchasedname' => ['required_if:status,Purchased','nullable','string'],
            'purchasedphone' => ['required_if:status,Purchased','nullable','string'],
        ];
    }
}
