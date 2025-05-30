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
        'notes'
    ];

    protected $casts = [
        'production_date' => 'date',
        'milk_qty' => 'float',
        'rennet_qty' => 'float',
        'citric_acid_qty' => 'float',
        'salt_qty' => 'float',
        'notes' => 'string'
    ];

    public function startup()
    {
        return $this->hasOne(Startup::class);
    }

    public function shutdown()
    {
        return $this->hasOne(Shutdown::class);
    }
}
