<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

use App\Models\Visit;
use App\Models\Clinic;
use App\Models\User;
use App\Models\Patient;
use Auth;

class HomeController extends Controller
{
    // Show the dashboard Home
    public function showHome(){
      // Logic will need to be added to pass $data and authenticate user

      // Check if user is logged in, if not send back to home
      if(!Auth::check()){
        return Redirect::to('/');
      }

      // Collect all clinics from the database for user to choose from
      $sql_clinics = Clinic::all();
      foreach ($sql_clinics as $clinic) {
        $clinics[$clinic['id']] = $clinic['Name'];
      }

      $data['user'] = Auth::User();
      $data['num_visits'] = Visit::all()->count();
      $data['num_clinics'] = Clinic::all()->count();
      $data['num_users'] = User::all()->count();
      $data['num_patients'] = Patient::all()->count();
      $data['clinics'] = $clinics;

      return view('dashboard/home')->with($data);
    }
}
