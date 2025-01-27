<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreContactRequest extends FormRequest
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
            'name' => 'required|max:255',
            'tel' => 'required|max:20',
            'email' => 'nullable',
            'comment' => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Поле :attribute является обязательным.',
            'max' => 'Размер поля :attribute не должен превышать :max символов',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Имя',
            'tel' => 'Телефон',
            'email' => 'E-mail',
            'comment' => 'Комментарий',
        ];
    }
}
