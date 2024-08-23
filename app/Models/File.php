<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Number;
use Illuminate\Support\Str;

class File extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'filename',
        'extension',
        'description',
        'name',
    ];

    public function getFullNameFileAttribute()
    {
        return "{$this->filename}.{$this->extension}";
    }

    public function getSize()
    {
        if (Storage::disk('files')->exists($this->getFullNameFileAttribute()))
            return Number::fileSize(Storage::disk('files')->size($this->getFullNameFileAttribute()));
        else {
            Log::channel('daily-images')->warning('Нет файла  ' . $this->getFullNameFileAttribute());
            return Number::fileSize(0);
        }
    }

    public function getUrl($size = 300)
    {
        if (Storage::disk('product')->exists("/{$size}/" . $this->getFullNameFileAttribute()))
            return Storage::disk('product')->url("/{$size}/") . $this->getFullNameFileAttribute();
        else {
            Log::channel('daily-images')->warning('Нет изображения ' . $this->getFullNameFileAttribute());
            return Storage::disk('product')->url("/{$size}/null.jpg");
        }
    }


    /**
     * Получить родительскую модель которой относится.
     */
    public function fileable()
    {
        return $this->morphTo();
    }
}
