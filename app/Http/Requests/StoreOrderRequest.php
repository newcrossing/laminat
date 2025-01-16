<?php

namespace App\Http\Requests;

use App\Enums\OrderDeliveryEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOrderRequest extends FormRequest
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
            'name' => 'required|max:255|min:2',
            'tel' => 'required|numeric',
            'email' => 'nullable|email',
            'delivery_address' => 'nullable',
            'comment' => 'nullable',
            "delivery_type" => [Rule::enum(OrderDeliveryEnum::class)]

        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Имя обязательно',
            'name.min' => 'Минимальная длинна 2 символа',
            'name.max' => 'Максимальная длинна 256 символов',
            'tel.required' => 'Номер телефона обязателен',
            'tel.numeric' => 'Номер телефона должен содержать только цифры',
            'collection_id.exists' => 'Выберите фирму и коллекцию ',
        ];
    }
}
