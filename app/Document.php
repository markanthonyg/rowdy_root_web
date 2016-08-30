<?php

namespace App\App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Document
 */
class Document extends Model
{
    protected $table = 'documents';

    public $timestamps = false;

    protected $fillable = [
        'pid',
        'name',
        'path',
        'type'
    ];

    protected $guarded = [];

        
}