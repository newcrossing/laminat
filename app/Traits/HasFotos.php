<?php

namespace App\Traits;

use App\Models\Foto;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasFotos
{
    /**
     * Добавляет полиморфнуя связь один ко многим для сохранения фотографий
     * @return MorphMany
     */
    public function fotos()
    {
        return $this->morphMany(Foto::class, 'fotoable');
    }


    /**
     * Получает первую запись фотографий
     * @return MorphOne
     */
    public function foto()
    {
        return $this->morphOne(Foto::class, 'fotoable')->oldest();
    }
}
