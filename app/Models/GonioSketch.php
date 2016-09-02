<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class GonioSketch
 */
class GonioSketch extends Model
{
    protected $table = 'gonio_sketches';

    public $timestamps = false;

    protected $fillable = [
        'vid',
        'image'
    ];

    protected $guarded = [];

        
}