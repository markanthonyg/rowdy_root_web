<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ClinicAdmin
 */
class ClinicAdmin extends Model
{
    protected $table = 'clinic_admins';

    public $timestamps = false;

    protected $fillable = [
        'uid',
        'cid'
    ];

    protected $guarded = [];

        
}