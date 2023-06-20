<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:books',
            'image' => 'required|string',
            'publication_year' => 'required|integer|min:1970|max:' . date('Y'),
            'description' => 'required',
            'authors' => 'required|array|min:1',
            'category' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'name.unique' => 'The name already exists.',
            'image.required' => 'The image field is required.',
            'image.string' => 'The image must be a string.',
            'publication_year.required' => 'The publication year field is required.',
            'publication_year.integer' => 'The publication year must be an integer.',
            'publication_year.min' => 'The publication year must be greater than or equal to 1970.',
            'publication_year.max' => 'The publication year must be less than or equal to the current year.',
            'description.required' => 'The description field is required.',
            'authors.required' => 'The authors field is required.',
            'authors.array' => 'The authors must be an array.',
            'authors.min' => 'At least one author must be provided.',
            'category.required' => 'The category field is required.',
            'category.string' => 'The category must be a string.',
        ];
    }
}

