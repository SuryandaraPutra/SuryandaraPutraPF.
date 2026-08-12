<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'title',
        'subtitle',
        'about_me',
        'email',
        'phone',
        'location',
        'gpa',
        'photo_path',
        'cv_pdf_path',
        'social_links',
    ];

    protected $casts = [
        'social_links' => 'array',
    ];
}
