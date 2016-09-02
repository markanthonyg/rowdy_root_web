<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Allergy
 */
class Allergy extends Model
{
    protected $table = 'allergies';

    public $timestamps = false;

    protected $fillable = [
        'pid',
        'allergy',
        'severity',
        'adverse_reaction'
    ];

    protected $guarded = [];

        
}