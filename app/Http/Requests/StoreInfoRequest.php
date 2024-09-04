<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class StoreInfoRequest extends FormRequest
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
            'slug' => ['required', Rule::unique('info', 'slug')->ignore($this->info)],
            'public' => 'boolean',
            'seo_keywords' => 'nullable',
            'seo_description' => 'nullable',
            'seo_title' => 'nullable',
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
