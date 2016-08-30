<?php

namespace App\App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vital
 */
class Vital extends Model
{
    protected $table = 'vitals';

    public $timestamps = false;

    protected $fillable = [
        'pid',
        'bps',
        'bpd',
        'bpunit',
        'fasting',
        'bg',
        'bgUnit',
        'o2sat',
        'hb',
        'hfeet',
        'hinches',
        'hcm',
        'hunit',
        'weight',
        'wunit',
        'notes',
        'dateCreated'
    ];

    protected $guarded = [];

        
}