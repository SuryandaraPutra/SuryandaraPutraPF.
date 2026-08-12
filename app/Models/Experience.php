<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'organization',
        'role_type',
        'period',
        'bullets',
        'order',
    ];

    protected $casts = [
        'bullets' => 'array',
    ];
}
