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

use Auth;


class VitalsController extends Controller
{

  public function updateVital() {

    $id = Input::get('id');
		$vital = Vital::find($id)->first();

    $vital->first_name = Input::get('firstname');
    $vital->middle = Input::get('middlename');
    $vital->last_name = Input::get('lastname');
    $vital->gender = Input::get('gender');
    $dob = Input::get('dob');
    $vital->birth_year = substr($dob,0,4);
    $vital->birth_month = substr($dob,5,2);
    $vital->birth_day = substr($dob,8,2);
    $vital->address = Input::get('address');
    $vital->address_2 = Input::get('address2');
    $vital->city_village = Input::get('city');
    $vital->state_province = Input::get('state');
    $vital->postal_code = Input::get('postal');
    $vital->country = Input::get('country');
    $vital->phone_number = Input::get('phone');
    $vital->save();

    // Get user to pass to master template in view


    // Probably not need
    $data['user'] = Auth::User();
    $data['patients'] = Patient::all();
    $data['num_patients'] = Patient::all()->count();
    $data['num_unapproved_users'] = User::where(['approved' => 0])->count();

    // Get patient from database to pass to view
    $data['patient'] = Patient::where('id', '=', $id)->first();
    $data['accounts'] = User::where('approved', '=', 1)->get();
    // return Redirect::back();//->with($data);

    $data['patient'] = Patient::where('id', '=', $id)->first();


    return view('Dashboard/patient_profile')->with($data);
  }
  //
  // // Show the dashboard Home
  // public function showPatients(){
  //   // Logic will need to be added to pass $data and authenticate user
  //
  //   // Check if user is logged in, if not send back to home
  //   if(!Auth::check()){
  //     return Redirect::to('/');
  //   }
  //
  //   $data['user'] = Auth::User();
  //   $data['patients'] = Patient::all();
  //   $data['num_patients'] = Patient::all()->count();
  //   $data['num_unapproved_users'] = User::where(['approved' => 0])->count();
  //
  //   return view('dashboard/patients')->with($data);
  // }
  //
  // public function addPatient(){
  //   // Logic will need to be added to pass $data and authenticate user
  //
  //   // Check if user is logged in, if not send back to home
  //   if(!Auth::check()){
  //     return Redirect::to('/');
  //   }
  //
  //   $data['user'] = Auth::User();
  //   $data['patients'] = Patient::all();
  //   $data['num_patients'] = Patient::all()->count();
  //   $data['num_unapproved_users'] = User::where(['approved' => 0])->count();
  //
  //   return view('dashboard/new_patient')->with($data);
  // }
  //
  public function insertVital(){
    // Logic will need to be added to pass $data and authenticate user

    // Check if user is logged in, if not send back to home
    if(!Auth::check()){
      return Redirect::to('/');
    }

    // Collect variables from form
    $pid =

    $pid = Input::get('firstname');
    $bps = Input::get('middlename');
    $bpd = Input::get('lastname');
    $gender = Input::get('gender');
    $dob = Input::get('dob');
    $birthyear = substr($dob,0,4);
    $birthmonth = substr($dob,5,2);
    $birthday = substr($dob,8,2);
    $address = Input::get('address');
    $address2 = Input::get('address2');
    $city = Input::get('city');
    $state = Input::get('state');
    $country = Input::get('country');
    $zip = Input::get('postal');
    $phone = Input::get('phone');

    try {
        // Create Vital
        $vital = Vital::create([
            'pid' => $pid,
            'first_name' => $firstname,
            'middle' => $middlename,
            'last_name' => $lastname,
            'gender' => $gender,
            'birth_day' => $birthday,
            'birth_month' => $birthmonth,
            'birth_year' => $birthyear,
            'address' => $address,
            'address_2' => $address2,
            'city_village' => $city,
            'state_province' => $state,
            'country' => $country,
            'postal_code' => $zip,
            'phone_number' => $phone,
        ]);
    } catch (Exception $error_message) {
        // Error log
        Session::flash('error_message', 'Oops!, something went wrong!');

        return Response::json($error_message, 401);
    }

    return Redirect::to('patient/'.$patient->id);
  }
}
