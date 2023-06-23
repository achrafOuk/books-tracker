<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookCommentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'comment' => 'required|string',
            'rating' => 'required|integer|between:1,5',
        ];
    }

    public function messages()
    {
        return [
            'comment.required' => 'The comment field is required.',
            'comment.string' => 'The comment must be a string.',
            'rating.required' => 'The rating field is required and it must be between 1 and 5.',
            'rating.integer' => 'The rating must be an integer.',
            'rating.between' => 'The rating must be between 1 and 5.',
        ];
    }
}
