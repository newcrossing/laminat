<?php

namespace App\Traits;

use App\Models\File;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasFiles
{
    /**
     * Добавляет полиморфнуя связь один ко многим для сохранения фотографий
     * @return MorphMany
     */
    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }
}
