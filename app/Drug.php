<?php

namespace App\App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Drug
 */
class Drug extends Model
{
    protected $table = 'drugs';

    public $timestamps = false;

    protected $fillable = [
        'PROPRIETARYNAME',
        'NONPROPRIETARYNAME'
    ];

    protected $guarded = [];

        
}