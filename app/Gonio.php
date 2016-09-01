<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Gonio
 */
class Gonio extends Model
{
    protected $table = 'gonios';

    public $timestamps = false;

    protected $fillable = [
        'vid',
        'isHxFHA',
        'FHASide',
        'isODNormal',
        'odABCDNon',
        'odABCDComp',
        'odDegreeNon',
        'odDegreeComp',
        'odRSQNon',
        'odRSQComp',
        'odPigment',
        'isODAntPigLine',
        'isOSNormal',
        'osABCDNon',
        'osABCDComp',
        'osDegreeNon',
        'osDegreeComp',
        'osRSQNon',
        'osRSQComp',
        'osPigment',
        'isOSAntPigLine'
    ];

    protected $guarded = [];


}
