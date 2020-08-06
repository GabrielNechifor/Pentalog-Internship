<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAuthorPost extends FormRequest
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
            'gender' => 'required|string|in:male,female,unknown',
            'country' => 'required|string',
            'birth_date' => 'required|date|before_or_equal:' . date('Y-m-d'),
            'death_date' => 'nullable|date|after:birth_date',
            'image' => 'required|image'
        ];
    }
}
