<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StateUpdateRequest extends FormRequest
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
            'symbol' => ['sometimes', 'string', 'max:10'],
            'is_active' => ['sometimes', 'boolean'],
            'name' => ['sometimes', 'string', 'max:255'],
            'investment_facilities' => ['sometimes', 'integer', 'min:0', 'max:100'],
            'education_rank' => ['sometimes', 'integer', 'min:0', 'max:100'],
            'tourism' => ['sometimes', 'integer', 'min:0', 'max:100'],
            'jobs_and_business' => ['sometimes', 'integer', 'min:0', 'max:100'],
            'accommodation' => ['sometimes', 'integer', 'min:0', 'max:100'],
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
            'investment_facilities.min' => 'Investment facilities must be at least 0.',
            'investment_facilities.max' => 'Investment facilities cannot exceed 100.',
            'education_rank.min' => 'Education rank must be at least 0.',
            'education_rank.max' => 'Education rank cannot exceed 100.',
            'tourism.min' => 'Tourism score must be at least 0.',
            'tourism.max' => 'Tourism score cannot exceed 100.',
            'jobs_and_business.min' => 'Jobs and business score must be at least 0.',
            'jobs_and_business.max' => 'Jobs and business score cannot exceed 100.',
            'accommodation.min' => 'Accommodation score must be at least 0.',
            'accommodation.max' => 'Accommodation score cannot exceed 100.',
        ];
    }
}
