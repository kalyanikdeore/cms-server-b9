<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReliableService extends Model
{
    use HasFactory;

  // In ReliableService.php
protected $fillable = [
    'title', // Make sure this is included
    'description',
    'image_path',
    'background_color',
    'is_active',
    'order',
];


    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    // Accessor for full image URL
    public function getImageUrlAttribute()
    {
        return asset('storage/'.$this->image_path);
    }

    // Scope for active items
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope for ordered listing
    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    // Scope for featured services (optional)
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}