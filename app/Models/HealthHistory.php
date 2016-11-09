<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class HealthHistory
 */
class HealthHistory extends Model
{
    protected $table = 'health_history';

    public $timestamps = false;

    protected $fillable = [
        'pid',
        'pc',
        'da',
        'bt',
        'pmh',
        'psh',
        'fh',
        'law',
        'pe'
    ];

    protected $guarded = [];

        
}