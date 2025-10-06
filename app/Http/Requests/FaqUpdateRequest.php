<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaqUpdateRequest extends FormRequest
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
            'question_en' => ['sometimes', 'string', 'max:1000'],
            'answer_en' => ['sometimes', 'string', 'max:5000'],
            'question_fa' => ['sometimes', 'string', 'max:1000'],
            'answer_fa' => ['sometimes', 'string', 'max:5000'],
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
            'question_en.required' => 'English question is required.',
            'answer_en.required' => 'English answer is required.',
            'question_fa.required' => 'Persian question is required.',
            'answer_fa.required' => 'Persian answer is required.',
        ];
    }
}
