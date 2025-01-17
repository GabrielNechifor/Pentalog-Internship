<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserPost extends FormRequest
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
            'name' => 'required|string',
            'gender' => 'required|in:male,female,unknown',
            'birth_date' => 'required|date|before:' . date('Y-m-d'),
            'address' => 'required|string',
            'phone_number' => 'required|regex:/[0-9]*/'
        ];
    }
}
