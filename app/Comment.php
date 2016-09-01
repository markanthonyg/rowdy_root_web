<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 */
class Comment extends Model
{
    protected $table = 'comments';

    public $timestamps = false;

    protected $fillable = [
        'pid',
        'type',
        'typeid',
        'comment',
        'dateCreated'
    ];

    protected $guarded = [];


}
