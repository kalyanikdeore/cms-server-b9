<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    /**
     * Get the active videos with full URLs
     *
     * @return array
     */
    public function getActiveVideosAttribute()
    {
        $videos = [];
        
        if ($this->video1) {
            $videos[] = Storage::disk('public_uploads')->url($this->video1);
        }
        
        if ($this->video2) {
            $videos[] = Storage::disk('public_uploads')->url($this->video2);
        }
        
        return $videos;
    }
}