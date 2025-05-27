<?php

namespace App\Models;

use App\Traits\HasFotos;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasFotos;

    const COUNT_OF_PAGINATION = 24;

    protected $guarded = [];

    protected $fillable = [
        'name',
        'block',
        'public',
        'target_url',
        'target_url_self',
        'url',
        'order',
    ];

    protected $casts = [
        'public' => 'boolean',
        'target_url_self' => 'boolean',
    ];
}
