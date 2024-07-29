<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
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

    public function href($size = 200)
    {
        return Storage::url("/images/{$size}/" . $this->full_name_file);
    }



    /**
     * Получить родительскую модель которой относится.
     */
    public function fotoable()
    {
        return $this->morphTo();
    }
}
