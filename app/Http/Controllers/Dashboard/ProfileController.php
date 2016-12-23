<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\Patient;
use App\Models\Vital;
use App\Models\Allergy;
use App\Models\Visit;
use App\Models\File;
use App\Models\Surgery;
use App\Models\HealthHistory;
use DB;

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

      // $data['vitals'] = Vital::where('approved', '=', 'id')


      if($data['patient'] == NULL) {
        // Patient not found
        return Redirect::to('/');
      }
      $data['accounts'] = User::where('approved', '=', 1)->get();

      // Check if patient has any allergies and set allergy_alert variable
      if ( Allergy::where('pid', '=', $data['patient']->id)->count() > 0 ){
        $data['allergy_alert'] = true;
      } else {
        $data['allergy_alert'] = false;
      }

      // Pass all visits for this patient to the profile view
      $visits = array();
      $data['visits'] = Visit::where('pid', '=', $data['patient']->id)->get();

      // $result = DB::table('vitals')->where('id', '222');
      // $result = DB::table('vitals');

      $data['health_history'] = HealthHistory::where('pid', '=', $id)->first();


      // $data['vitals'] = Vital::where('id', '=', '222');
      $data['vitals'] = Vital::where(['pid' => $id])->get();
      // $data['vitals'] = Vital::all()->where('pid','=','2');
      // $data['vitals'] = Vital::where('pid', '=', $id);
      // dd($data['vitals']);

      $data['surgeries'] = Surgery::where(['pid' => $id])->get();
      $data['files'] = File::where(['pid' => $id])->get();

      return view('Dashboard/patient_profile')->with($data);
    }

}
