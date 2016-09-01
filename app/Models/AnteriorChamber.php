<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AnteriorChamber
 */
class AnteriorChamber extends Model
{
    protected $table = 'anterior_chambers';

    public $timestamps = false;

    protected $fillable = [
        'vid',
        'isACODNormal',
        'isACOSNormal',
        'ACDepthOD',
        'ACDepthOS',
        'ACAngleOD',
        'ACAngleOS',
        'PASOD',
        'PASOS',
        'ACODKP',
        'ACOSKP',
        'isShuntOD',
        'isScarringOD',
        'isTraumaOD',
        'isBlebOD',
        'isShuntOS',
        'isScarringOS',
        'isTraumaOS',
        'isBlebOS',
        'isVascularOD',
        'BlebOD_Num',
        'isVascularOS',
        'BlebOS_Num',
        'isKSpindleOD',
        'isKSpindleOS'
    ];

    protected $guarded = [];

        
}