<?php

namespace App\Models;

use App\Traits\HasFotos;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasFotos;

    protected $fillable = [
        'name',
        'text',
        'h1',
        'h2',
        'type',
        'public',
        'link',
    ];
    protected $casts = [
        'public' => 'boolean',
    ];
}
