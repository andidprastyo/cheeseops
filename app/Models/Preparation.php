<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preparation extends Model
{
    protected $fillable = [
        'production_date',
        'milk_qty',
        'rennet_qty',
        'citric_acid_qty',
        'salt_qty',
        'fat_content',
        'notes'
    ];

    protected $casts = [
        'production_date' => 'date',
        'milk_qty' => 'float',
        'rennet_qty' => 'float',
        'citric_acid_qty' => 'float',
        'salt_qty' => 'float',
        'fat_content' => 'float',
        'notes' => 'string'
    ];

    public function startup()
    {
        return $this->hasOne(Startup::class);
    }
}
