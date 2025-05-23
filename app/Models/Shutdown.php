<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shutdown extends Model
{
    protected $fillable = [
        'preparation_id',
        'cheese_weight',
        'whey_volume',
        'final_analysis'
    ];

    public function preparation()
    {
        return $this->belongsTo(Preparation::class);
    }
} 