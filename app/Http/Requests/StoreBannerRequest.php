<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBannerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255|min:3',
            'public' => 'boolean',
            'block' => 'nullable',
            'target_url' => 'nullable',
            'target_url_self' => 'nullable',
            'url' => 'url',

        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Название обязательно',
            'name.min' => 'Минимальная длинна названия 3 символа',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'public' => $this->public ? true : false,
            'target_url_self' => $this->target_url_self ? true : false,
        ]);
    }
}
