<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class AuthenticateLogiRequest extends FormRequest
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
            'login' => 'required|min:3|max:20',
            'password' => 'required|min:6'
        ];
    }

    /**
     * Получить сообщения об ошибках для определенных правил валидации.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'login.required' => 'Поле обязательно для заполнения',
            'login.min' => 'Минимум 3 знака',
            'login.max' => 'Максимум 20 знаков',
            'password.required' => 'Поле обязательно для заполнения',
            'password.min' => 'Минимум 6 знаков',
        ];
    }
}
