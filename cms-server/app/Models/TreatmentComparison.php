<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreatmentComparison extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'video_path',
        'note_title',
        'note_content',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];
}