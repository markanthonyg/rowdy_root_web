<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Surgerytemplate
 */
class File extends Model
{
    protected $table = 'files';

    public $timestamps = false;

    protected $fillable = [
        'pid',
        'file_name'
    ];

    protected $guarded = [];


}
