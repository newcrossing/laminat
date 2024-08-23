<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;


class StoreFirmRequest extends FormRequest
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
            'text' => 'nullable|string',
            'slug' => ['required', Rule::unique('firms', 'slug')->ignore($this->firm)],
            'public' => 'boolean',
            'description' => 'nullable',
            'files' => 'nullable',
        ];


    }

    public function messages(): array
    {
        return [
            'name.required' => 'Название обязательно',
            'name.min' => 'Минимальная длинна названия 3 символа',
            'slug.unique' => 'Необходимо уникальное название',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => $this->slug ?: Str::slug($this->name),
            'public' => $this->public ? true : false,
        ]);
    }
}
