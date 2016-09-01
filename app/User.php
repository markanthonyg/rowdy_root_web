<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 */
class User extends Model
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
        'role'
   ];

    protected $guarded = ['password', 'remember_token'];


}
