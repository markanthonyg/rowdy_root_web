<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FundusSketch
 */
class FundusSketch extends Model
{
    protected $table = 'fundus_sketches';

    public $timestamps = false;

    protected $fillable = [
        'vid',
        'image'
    ];

    protected $guarded = [];

        
}