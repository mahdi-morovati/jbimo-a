<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostBookRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'isbn' => 'required|digits:13|unique:books,isbn',
            'title' => 'required|string',
            'description' => 'required|string',
            'authors' => 'required|present|array',
            'authors.*' => 'numeric|exists:authors,id'
        ];
    }
}
