<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Lense
 */
class Lense extends Model
{
    protected $table = 'lenses';

    public $timestamps = false;

    protected $fillable = [
        'vid',
        'NS_OD',
        'NS_OD_Notes',
        'NS_OS',
        'NS_OS_Notes',
        'isStableLensOD',
        'isStableLensOS',
        'isPseudophakia_OD',
        'isPseudophakia_OS',
        'isPCO_OD',
        'isPCO_OS',
        'Coritcal_OD',
        'Cortical_OD_Notes',
        'Coritcal_OS',
        'Cortical_OS_Notes',
        'PSC_OD',
        'PSC_OD_Notes',
        'PSC_OS',
        'PSC_OS_Notes'
    ];

    protected $guarded = [];

        
}