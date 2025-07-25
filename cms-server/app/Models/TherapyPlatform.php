<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TherapyPlatform extends Model
{
    use HasFactory;

    protected $fillable = [
        'tab_name',
        'feature_name',
        'feature_description',
        'sort_order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeForTab($query, $tabName)
    {
        return $query->where('tab_name', $tabName);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}