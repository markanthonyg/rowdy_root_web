<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\Patient;
use Auth;
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
      $data['patients'] = Patient::all();
      $data['num_patients'] = Patient::all()->count();
      $data['num_unapproved_users'] = User::where(['approved' => 0])->count();

      // Get patient from database to pass to view
      $data['patient'] = Patient::where('id', '=', $id)->first();


      if($data['patient'] == NULL){
        // Patient not found
        return Redirect::to('/');
      }
      	$data['accounts'] = User::where('approved', '=', 1)->get();

      return view('Dashboard/patient_profile')->with($data);
    }
}
