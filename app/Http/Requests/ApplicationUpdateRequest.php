<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationUpdateRequest extends FormRequest
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
            'status'=>'required|in:new,processed,customer',
            'date_meeting'=>'exclude_unless:status,processed|date|after_or_equal:today',
            'manager_comment'=>'exclude_unless:status,processed|string|max:1000'
        ];
    }
}
