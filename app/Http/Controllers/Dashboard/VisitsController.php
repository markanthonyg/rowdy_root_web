<?php

namespace App\Http\Controllers\Dashboard;

use Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Patient;
use App\Models\Visit;
use App\Models\DistanceVision;

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
      **  Collect variables from form
      */
      // Patient Demographics
      $patient_id=1;

      // Check if patient wants to remain anon
      // if(/* anon box is checked */){
      //   /* patient will not have first name and last name */
      // } else {
      //   $firstname = "";
      //   $lastname = "";
      //   // Other patient demo info
      //  // insert patient and get patient ID back
      // }
      $chief_complaint = Input::get('chief_complaint');
      $assessment = Input::get('assessment');
      $plan = Input::get('plan');

      // Distance visions
      $dvodsc = Input::get('dv_right');
      $dvossc = Input::get('dv_left');
      $dvodcc = Input::get('dv_glasses_right');
      $dvoscc = Input::get('dv_glasses_left');

      // Glasses RX
      $rx_od_sphere = Input::get('rx_od_sphere');
      $rx_od_cylinder = Input::get('rx_od_cylinder');
      $rx_od_axis = Input::get('rx_od_axis');
      $rx_od_add = Input::get('rx_od_add');
      $rx_os_sphere = Input::get('rx_os_sphere');
      $rx_os_cylinder = Input::get('rx_os_cylinder');
      $rx_os_axis = Input::get('rx_os_axis');
      $rx_os_add = Input::get('rx_os_add');
      $rx_notes = Input::get('rx_notes');

      // Refraction
      if(Input::get('refraction_type') == "manifest_refraction"){
        $isManifest = 1;
      } else {
        $isManifest = 0;
      }
      


      /*
      **  Create visit objects
      */
      $new_visit = Visit::create([
        'pid' => $patient_id,
        'chiefComplaint' => $chief_complaint,
        'assessment' => $assessment,
        'plan' => $plan
      ]);

      $new_distance_visiions = DistanceVision::create([
        'DVODSC' => $dvodsc,
        'DVOSSC' => $dvossc,
        'DVODCC' => $dvodcc,
        'DVOSCC' => $dvoscc,
        'vid' => $new_visit->id
      ]);

      $new_glasses_rx = GlassesRx::create([
        'OD_Sphere' => $rx_od_sphere,
        'OD_Cyl' => $rx_od_cylinder,
        'OD_Axis' => $rx_od_axis,
        'OD_Add' => $rx_od_add,
        'OS_Sphere' => $rx_os_sphere,
        'OS_Cyl' => $rx_os_cylinder,
        'OS_Axis' => $rx_os_axis,
        'OS_Add' => $rx_os_add,
        'GlassesRxNotes' => $rx_notes,
        'vid' => $new_visit->id
      ]);

    }
}
