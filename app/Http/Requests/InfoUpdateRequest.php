<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InfoUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Authorization handled by middleware
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title_en' => ['sometimes', 'string', 'max:255'],
            'title_fa' => ['sometimes', 'string', 'max:255'],
            'body_en' => ['nullable', 'string'],
            'body_fa' => ['nullable', 'string'],
            'image' => ['nullable', 'string', 'max:255'],
        ];
    }
}
