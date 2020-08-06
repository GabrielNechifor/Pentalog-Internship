<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBorrowingPut extends FormRequest
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
            'book_title' => 'required|exists:books,title',
            'user_name' => 'required|exists:users,name',
            'borrowing_date' => 'required|date|before_or_equal:' . date('Y-m-d'),
            'returning_date' => 'nullable|date|after_or_equal:borrowing_date|before_or_equal:' . date('Y-m-d')
        ];
    }
}
