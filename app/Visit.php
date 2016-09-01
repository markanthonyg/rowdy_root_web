<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Visit
 */
class Visit extends Model
{
    protected $table = 'visits';

    public $timestamps = false;

    protected $fillable = [
        'pid',
        'chiefComplaint',
        'assessment',
        'plan',
        'dateCreated'
    ];

    protected $guarded = [];


}
