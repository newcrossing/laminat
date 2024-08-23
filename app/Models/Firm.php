<?php

namespace App\Models;

use App\Traits\HasFiles;
use App\Traits\HasFotos;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Firm extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasFiles;
    use HasFotos;

    protected $fillable = [
        'name',
        'text',
        'description',
        'public',
        'slug',
    ];
    protected $casts = [
        'public' => 'boolean',
    ];

    public function scopePublic(Builder $query): void
    {
        $query->where('public', true);
    }


    public function collections(): HasMany
    {
        return $this->hasMany(Collection::class);
    }
}
