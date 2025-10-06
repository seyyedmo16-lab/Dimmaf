<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlogStoreRequest extends FormRequest
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
            'state_id' => ['required', 'string', 'exists:states,symbol'],
            'title_en' => ['required', 'string', 'max:255'],
            'title_fa' => ['required', 'string', 'max:255'],
            'body_en' => ['nullable', 'string'],
            'body_fa' => ['nullable', 'string'],
            'link' => ['nullable', 'url', 'max:255'],
            'category_ids' => ['nullable', 'array'],
            'category_ids.*' => ['integer', 'exists:categories,id'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'state_id.required' => 'State is required.',
            'state_id.exists' => 'Selected state is invalid.',
            'title_en.required' => 'English title is required.',
            'title_fa.required' => 'Persian title is required.',
            'link.url' => 'Link must be a valid URL.',
            'category_ids.*.exists' => 'One or more selected categories are invalid.',
        ];
    }
}
