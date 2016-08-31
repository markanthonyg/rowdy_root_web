<?php

namespace App\App;

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