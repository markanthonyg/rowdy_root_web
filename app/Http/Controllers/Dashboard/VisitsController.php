<?php

namespace App\Http\Controllers\Dashboard;

use Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Patient;

class VisitsController extends Controller
{
    // Show form to add a new visit
    public function addVisit() {
      // Get user to pass to master template in view
      $data['user'] = Auth::User();

      $data['num_unapproved_users'] = User::where(['approved' => 0])->count();

      $data['patients'] = Patient::all();


      return view('dashboard/new_visit', $data);
    }

    // Insert visit into DB
    public function insertVisit() {
      // Logic will need to be added to pass $data and authenticate user

      // Check if user is logged in, if not send back to home
      if(!Auth::check()){
        return Redirect::to('/');
      }

      /*
        Collect variables from form
      */
      // Patient Demographics
      $patient_id=0;
      // Check if patient wants to remain anon
      if(/* anon box is checked */){
        /* patient will not have first name and last name */
      } else {
        $firstname = "";
        $lastname = "";
        // Other patient demo info
      }
      $chief_complaint = "";

      // Examination
      $vision_glasses_right = "";
      $vision_glasses_left = "";
      $vision_no_glasses_right = "";
      $vision_no_glasses_left = "";

      $glasses_rx_od_sphere = "";
      $glasses_rx_od_cylinder = "";
      $glasses_rx_od_axis = "";
      $glasses_rx_od_add = "";
      $glasses_rx_os_sphere = "";
      $glasses_rx_os_cylinder = "";
      $glasses_rx_os_axis = "";
      $glasses_rx_os_add = "";
      $glasses_rx_notes = "";


    }
}
