<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessResilience extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'video1',
        'video2',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    // Get the URLs for both videos
    public function getVideo1UrlAttribute()
    {
        return $this->video1 ? asset('storage/'.$this->video1) : null;
    }

    public function getVideo2UrlAttribute()
    {
        return $this->video2 ? asset('storage/'.$this->video2) : null;
    }

    // Get all active videos (non-null)
    public function getActiveVideosAttribute()
    {
        return array_filter([
            $this->video1_url,
            $this->video2_url
        ]);
    }
}