<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Iop
 */
class Iop extends Model
{
    protected $table = 'iops';

    public $timestamps = false;

    protected $fillable = [
        'vid',
        'ODValue',
        'ODType',
        'ODNotes',
        'OSValue',
        'OSType',
        'OSNotes',
        'dateCreated'
    ];

    protected $guarded = [];

        
}