<?php

namespace App\App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Refraction
 */
class Refraction extends Model
{
    protected $table = 'refractions';

    public $timestamps = false;

    protected $fillable = [
        'vid',
        'isManifest',
        'SC_OD_Sphere',
        'SC_OD_Cyl',
        'SC_OD_Axis',
        'SC_OS_Sphere',
        'SC_OS_Cyl',
        'SC_OS_Axis',
        'CC_OD_Sphere',
        'CC_OD_Cyl',
        'CC_OD_Axis',
        'CC_OS_Sphere',
        'CC_OS_Cyl',
        'CC_OS_Axis'
    ];

    protected $guarded = [];

        
}