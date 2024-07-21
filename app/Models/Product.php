<?php

namespace App\Models;

use App\Traits\HasFotos;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasFotos;


    protected $fillable = [
        'name',
        'text',
        'price',
        'square',
        'public',
        'article',
        'slug',
    ];
}
