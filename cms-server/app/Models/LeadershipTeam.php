<?php

// app/Models/LeadershipTeam.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadershipTeam extends Model
{
    use HasFactory;

    // Optional: Explicitly define table name if needed
    protected $table = 'leadership_teams';

    protected $fillable = [
        'name',
        'role',     
        'image',
        'desc',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}