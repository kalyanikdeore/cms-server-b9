<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthResilienceFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'video_path',
        'section_title',
        'section_description',
        'sort_order',
        'is_active'
    ];

    protected $appends = ['video_url'];

    public function getVideoUrlAttribute()
    {
        return $this->video_path ? asset('uploads/' . $this->video_path) : null;
    }
}