<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUslugiRequest extends FormRequest
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
            'phone' => 'required|max:20',
            'email' => 'nullable',
            'comment' => 'nullable',
            'uslugi' => 'required|array',
            'captcha' => 'required|captcha'
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Поле :attribute является обязательным.',
            'max' => 'Размер поля :attribute не должен превышать :max символов',
            'captcha' => 'Неверно ввели поле :attribute',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Имя',
            'phone' => 'Телефон',
            'email' => 'E-mail',
            'uslugi' => 'Услуги',
            'comment' => 'Комментарий',
            'captcha' => 'Капча',
        ];
    }
}
