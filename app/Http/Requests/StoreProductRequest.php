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
            'packing_volume' => 'nullable',
            'packing_weight' => 'nullable',
            'number_of_boards' => 'nullable',
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
        // убираю запятые из цен
        $this->price_metr =  str_replace([',', ' '], ['.', ''], $this->price_metr);
        $this->price_metr_sale =  str_replace([',', ' '], ['.', ''], $this->price_metr_sale);
        $this->price_upak =  str_replace([',', ' '], ['.', ''], $this->price_upak);
        $this->price_upak_sale =  str_replace([',', ' '], ['.', ''], $this->price_upak_sale);

        // Переставляю значения цен. Если есть скидка – то это значение записывается в текущую цену
        if (empty($this->price_metr_sale)) {
            $price_metr_actual = $this->price_metr ?: 0;
            $price_metr_old = 0;
        } else {
            $price_metr_actual = $this->price_metr_sale;
            $price_metr_old = $this->price_metr ?: 0;
        }

        if (empty($this->price_upak_sale)) {
            $price_upak_actual = $this->price_upak ?: 0;
            $price_upak_old = 0;
        } else {
            $price_upak_actual = $this->price_upak_sale;
            $price_upak_old = $this->price_upak ?: 0;
        }

        $this->merge([
            'slug' => $this->slug ?: 'p-' . Str::slug($this->name),
            'public' => $this->public ? true : false,
            'have_sklad' => $this->have_sklad ? true : false,
            'have_room' => $this->have_room ? true : false,
            'price_metr' => $price_metr_actual,
            'price_upak' => $price_upak_actual,
            'price_upak_sale' => $price_upak_old,
            'price_metr_sale' => $price_metr_old,
            'square' => ($this->square) ? Str::replace(',', '.', $this->square) : null,
            'packing_volume' => ($this->packing_volume) ? Str::replace(',', '.', $this->packing_volume) : null,
            'packing_weight' => ($this->packing_weight) ? Str::replace(',', '.', $this->packing_weight) : null,
            'number_of_boards' => ($this->number_of_boards) ? Str::replace(',', '.', $this->number_of_boards) : null,
        ]);
    }
}
