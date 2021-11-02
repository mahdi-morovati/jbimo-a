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
            'isbn' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'authors' => 'required|array',
            'authors.*' => 'exists:authors,id'
        ];
    }
}
