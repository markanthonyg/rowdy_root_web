<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Patient
 */
class Patient extends Model
{
    protected $table = 'patients';

    public $timestamps = false;

    protected $fillable = [
        'unidentified_patient',
        'first_name',
        'middle',
        'last_name',
        'gender',
        'birth_day',
        'birth_month',
        'birth_year',
        'estimated_birth_years',
        'estimated_birth_months',
        'address',
        'address_2',
        'city_village',
        'state_province',
        'country',
        'postal_code',
        'phone_number',
        'pic_path'
    ];

    protected $guarded = ['birth_day', 'birth_month', 'birth_year', 'phone_number', 'address', 'address_2'];


}
