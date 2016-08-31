<?php

namespace App\App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Surgery
 */
class Surgery extends Model
{
    protected $table = 'surgeries';

    public $timestamps = false;

    protected $fillable = [
        'pid',
        'title',
        'body'
    ];

    protected $guarded = [];

        
}