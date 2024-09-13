<?php

namespace App\Models;

use App\Traits\HasFotos;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collection extends Model
{
    use HasFactory;
    use SoftDeletes;
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

    public function firm(): BelongsTo
    {
        return $this->belongsTo(Firm::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
