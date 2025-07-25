<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentProcess extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'icon',
        'image',
        'content',
        'sort_order',
        'is_active'
    ];
}