<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookStatusRequest extends FormRequest
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

    public function rules()
    {
        return [
            'status_id' => 'required|integer',
            'book_id' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'status_id.required' => 'The status ID field is required.',
            'status_id.integer' => 'The status ID field must be an integer.',
            'book_id.required' => 'The book ID field is required.',
            'book_id.string' => 'The book ID field must be a string.',
        ];
    }
}
