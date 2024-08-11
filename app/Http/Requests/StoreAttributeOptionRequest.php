<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class StoreAttributeOptionRequest extends FormRequest
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
            'value' => 'required|max:255|min:3',
            'attribute_id' => 'exists:App\Models\Attribute,id',
        ];
    }
    public function messages(): array
    {
        return [
            'value.required' => 'Название обязательно',
            'value.min' => 'Минимальная длинна названия 3 символа',
            'attribute_id.exists' => 'Выберите параметр ',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([

        ]);
    }
}
