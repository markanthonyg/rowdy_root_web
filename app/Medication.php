<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Medication
 */
class Medication extends Model
{
    protected $table = 'medications';

    public $timestamps = false;

    protected $fillable = [
        'pid',
        'trade',
        'generic',
        'directions'
    ];

    protected $guarded = [];


}
