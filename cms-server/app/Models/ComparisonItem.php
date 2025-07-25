<?php

// app/Models/ComparisonItem.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComparisonItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'feature',
        'traditional',
        'b9',
        'sort_order',
        'show_icons',
    ];

    protected $casts = [
        'show_icons' => 'boolean',
    ];
}