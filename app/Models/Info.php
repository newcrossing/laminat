<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Info extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'info';

    protected $fillable = [
        'name',
        'text',
        'seo_keywords',
        'seo_description',
        'seo_title',
        'public',
        'slug',
    ];
    protected $casts = [
        'public' => 'boolean',
    ];
}
