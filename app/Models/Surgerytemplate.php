<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Surgerytemplate
 */
class Surgerytemplate extends Model
{
    protected $table = 'surgerytemplates';

    public $timestamps = false;

    protected $fillable = [
        'title',
        'description'
    ];

    protected $guarded = [];

        
}