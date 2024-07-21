<?php

namespace App\Traits;

use App\Models\Foto;
use Illuminate\Database\Eloquent\Relations\MorphMany;

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
}
