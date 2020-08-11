<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBorrowingPost extends FormRequest
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
            'book_title' => [
                'required',
                'string'
            ],
            'user_name' => [
                'required',
                'string',
                'exists:users,name'
            ],
            'borrowing_date' => [
                'sometimes',
                'nullable',
                'date',
                'before_or_equal:' . date('Y-m-d')
            ],
            'returning_date' => [
                'sometimes',
                'nullable',
                'date',
                'after_or_equal:borrowing_date',
                'before_or_equal:' . date('Y-m-d')
            ]
        ];
    }
}
