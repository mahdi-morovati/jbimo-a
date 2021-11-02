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
            'isbn' => 'required|numeric|digits_between:97883283023414,97883283023422',
            'title' => 'required|string',
            'description' => 'required|string',
            'authors' => 'required|present|array',
            'authors.*' => 'numeric|exists:authors,id'
        ];
    }
}
