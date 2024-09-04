<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Foto extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'filename',
        'extension',
        'description',
    ];

    public function getFullNameFileAttribute()
    {
        return "{$this->filename}.{$this->extension}";
    }

    public function getUrlForCroppa()
    {
        return "storage/" . config('croppa.crops_disk') . "/" . $this->getFullNameFileAttribute();;
    }


    public function getUrlCr($size = 400)
    {
        if (Storage::disk('product')->exists("/cr_{$size}/" . $this->getFullNameFileAttribute()))
            return Storage::disk('product')->url("/cr_{$size}/") . $this->getFullNameFileAttribute();
        else {
            Log::channel('daily-images')->warning('Нет изображения кроп ' . $this->getFullNameFileAttribute());
            return Storage::disk('product')->url("/cr_{$size}/null.jpg");
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
    public function fotoable()
    {
        return $this->morphTo();
    }
}
