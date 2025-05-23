<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'process_type',
        'input_data',
        'status',
        'completed_at'
    ];

    protected $casts = [
        'input_data' => 'array',
        'completed_at' => 'datetime'
    ];
}
