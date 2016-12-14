<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Patient;
use App\Models\User;

class APIController extends Controller
{
    // Return all patients in a json
    public function allPatients(){
      return Patient::all()->toJson();
    }

    // Return all users in a json
    public function allUsers(){
      return User::all()->toJson();
    }
}
