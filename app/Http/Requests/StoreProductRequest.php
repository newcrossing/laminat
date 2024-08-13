<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
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
            'price_metr' => 'nullable',
            'price_upak' => 'nullable',
            'price_metr_sale' => 'nullable',
            'price_upak_sale' => 'nullable',
            'square' => 'nullable',
            'param_sdt' => 'nullable',
            'type_id' => 'exists:App\Models\Type,id',
            'collection_id' => 'exists:App\Models\Collection,id',
            'article' => 'nullable',
            'slug' => ['required', Rule::unique('products', 'slug')->ignore($this->product)],
            'public' => 'boolean',
            'have_sklad' => 'boolean',
            'have_room' => 'boolean',
            'attributes' => 'nullable',
            'description' => 'nullable',
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
            'name.required' => 'Название обязательно',
            'name.min' => 'Минимальная длинна названия 3 символа',
            'type_id.exists' => 'Выберите тип продукции',
            'collection_id.exists' => 'Выберите фирму и коллекцию ',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => $this->slug ?: 'p-' . Str::slug($this->name),
            'public' => $this->public ? true : false,
            'have_sklad' => $this->have_sklad ? true : false,
            'have_room' => $this->have_room ? true : false,
            'price_metr' => $this->price_metr ?: 0,
            'price_upak' => $this->price_upak ?: 0,
            'price_upak_sale' => $this->price_upak_sale ?: 0,
            'price_metr_sale' => $this->price_metr_sale ?: 0,
            'square' => ($this->square) ? Str::replace(',', '.', $this->square) : null,
        ]);
    }
}
