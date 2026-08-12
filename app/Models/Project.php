<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'role',
        'period',
        'summary',
        'problem_statement',
        'solution',
        'key_features',
        'tech_stack',
        'demo_url',
        'github_url',
        'image_path',
        'is_featured',
        'order',
    ];

    protected $casts = [
        'key_features' => 'array',
        'tech_stack' => 'array',
        'is_featured' => 'boolean',
    ];
}
