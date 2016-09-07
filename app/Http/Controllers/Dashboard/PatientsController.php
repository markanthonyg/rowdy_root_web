<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Patient;
use Auth;

class PatientsController extends Controller
{
  // Show the dashboard Home
  public function showPatients(){
    // Logic will need to be added to pass $data and authenticate user

    // Check if user is logged in, if not send back to home
    if(!Auth::check()){
      return Redirect::to('/');
    }

    $data['user'] = Auth::User();
    $data['patients'] = Patient::all();
    $data['num_patients'] = Patient::all()->count();

    return view('dashboard/patients')->with($data);
  }
}
