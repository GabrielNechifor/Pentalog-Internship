<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBookPost extends FormRequest
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
            'title' => 'required|string',
            'author_name' => 'required|string|exists:authors,name',
            'publisher_name' => 'required|string|exists:publishers,name',
            'publish_year' => 'required|integer|min:1800|max:' . date('Y'),
            'image' => 'required|image'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'A title is required',
            'title.string' => 'The title must be a text',
            'author_name.required' => 'A author name is required',
            'author_name.string' => 'The author name must be a text',
            'author_name.exists' => 'The author doesn\'t exist',

            'publisher_name.required' => 'A publisher name is required',
            'publisher_name.string' => 'The publisher name must be a text',
            'publisher_name.exists' => 'The publisher doesn\'t exist',

            'publish_year.required' => 'A publish year is required',
            'publish_year.integer' => 'The title must be a number',
            'publish_year.min' => 'The publish year must be greater than 1800',
            'publish_year.max' => 'The publish year must be lower or equal than ' . date('Y'),

            'image.required' => 'An image is required',
            'image.image' => 'The file must be an image'
        ];
    }
}
