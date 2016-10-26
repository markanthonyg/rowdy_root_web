<?php

namespace App\Http\Controllers\Dashboard;

use Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Patient;

class ProfileController extends Controller
{
    /*
    ** Show profile view
    */
    public function showPatientProfile($id){
      // Check that user has access to this page
      if(!Auth::Check()){
        return Redirect::to('/');
      }

      // Get user to pass to master template in view
      $data['user'] = Auth::User();
      $data['num_unapproved_users'] = User::where(['approved' => 0])->count();

      // Get patient from database to pass to view
      $data['patient'] = Patient::where('id', '=', $id)->first();


      if($data['patient'] == NULL){
        // Patient not found
        return Redirect::to('/');
      }

      return view('Dashboard/patient_profile', $data);
    }
}
