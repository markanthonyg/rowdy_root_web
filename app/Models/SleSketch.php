<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SleSketch
 */
class SleSketch extends Model
{
    protected $table = 'sle_sketches';

    public $timestamps = false;

    protected $fillable = [
        'vid',
        'image'
    ];

    protected $guarded = [];

        
}