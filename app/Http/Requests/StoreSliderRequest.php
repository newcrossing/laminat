<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class StoreSliderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:255|min:3',
            'text' => 'nullable|string',
            'public' => 'boolean',
            'h1' => 'nullable',
            'h2' => 'nullable',
            'link' => 'nullable',
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
            'type' => 'home-main',
            'public' => $this->public ? true : false,
        ]);
    }
}
