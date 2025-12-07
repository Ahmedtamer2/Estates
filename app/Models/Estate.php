<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    protected $fillable = [
        'name',
        'price',
        'operation_type',
        'images',
        'address',
        'area',
        'rooms',
        'bathrooms',
    ];

    protected $casts = [
        'images' => 'array',
    ];
}
