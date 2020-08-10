<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBookPut extends FormRequest
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
            'title' => [
                'required',
                'string'
            ],
            'author_name' => [
                'required',
                'string',
                'exists:authors,name'
            ],
            'type' => [
                'required',
                'string',
                'in:Light novel,Manga'
            ],
            'publisher_name' => [
                'required',
                'string',
                'exists:publishers,name'
            ],
            'publish_year' => [
                'required',
                'integer',
                'between:1800,' . date('Y')
            ],
            'copies' =>[
                'required',
                'integer',
                'between:1,10000000'
            ],
            'image' => [
                'nullable',
                'image'
            ]
        ];
    }

}
