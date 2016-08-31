<?php

namespace App\App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class GlassesRx
 */
class GlassesRx extends Model
{
    protected $table = 'glasses_rxs';

    public $timestamps = false;

    protected $fillable = [
        'vid',
        'OD_Sphere',
        'OD_Cyl',
        'OD_Axis',
        'OD_Add',
        'OS_Sphere',
        'OS_Cyl',
        'OS_Axis',
        'OS_Add',
        'GlassesRxNotes'
    ];

    protected $guarded = [];

        
}