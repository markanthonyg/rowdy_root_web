<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FundusExam
 */
class FundusExam extends Model
{
    protected $table = 'fundus_exams';

    public $timestamps = false;

    protected $fillable = [
        'vid',
        'isDialated',
        'dialNotes',
        'isCDODAb',
        'CDOD',
        'CDODNotes',
        'isCDOSAb',
        'CDOS',
        'CDOSNotes',
        'isRetinaODAb',
        'RetinaODNotes',
        'isRetinaOSAb',
        'RetinaOSNotes',
        'isMaculaODAb',
        'MaculaODNotes',
        'isMaculaOSAb',
        'MaculaOSNotes'
    ];

    protected $guarded = [];


}
