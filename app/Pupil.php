<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pupil
 */
class Pupil extends Model
{
    protected $table = 'pupils';

    public $timestamps = false;

    protected $fillable = [
        'vid',
        'isBothPupilsNormal',
        'bothShape',
        'bothDiameter',
        'isBothRAPD',
        'isBothSynechia',
        'isRightPupilNormal',
        'rightShape',
        'rightDiameter',
        'isRightRAPD',
        'isRightSynechia',
        'isLeftPupilNormal',
        'leftShape',
        'leftDiameter',
        'isLeftRAPD',
        'isLeftSynechia'
    ];

    protected $guarded = [];


}
