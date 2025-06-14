<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TherapyFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'icon',
        'sort_order',
        'is_active',
        'has_video',
        'video_title',
        'video_description',
        'youtube_url'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'has_video' => 'boolean'
    ];
}