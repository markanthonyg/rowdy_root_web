<?php

namespace App\App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DistanceVision
 */
class DistanceVision extends Model
{
    protected $table = 'distance_visions';

    public $timestamps = false;

    protected $fillable = [
        'vid',
        'DVODSC',
        'DVOSSC',
        'DVODCC',
        'DVOSCC'
    ];

    protected $guarded = [];

        
}