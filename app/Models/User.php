<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 */
class User extends Authenticatable
{
    protected $table = 'users';

    public $timestamps = false;

    protected $fillable = [
        'username',
        'password',
        'email',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'dob',
        'role',
        'remember_token'
    ];

    protected $guarded = ['password', 'remember_token'];


}
