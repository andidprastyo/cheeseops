<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Startup extends Model
{
    protected $fillable = [
        'preparation_id',
        'temperature',
        'analysis'
    ];

    public function preparation()
    {
        return $this->belongsTo(Preparation::class);
    }
} 