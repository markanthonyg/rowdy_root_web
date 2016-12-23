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

class PatientsController extends Controller
{

  public function updatePatient() {
    $id = Input::get('id');
		$patient = Patient::find($id);

    $patient->first_name = Input::get('firstname');
    $patient->middle = Input::get('middlename');
    $patient->last_name = Input::get('lastname');
    $patient->gender = Input::get('gender');
    $dob = Input::get('dob');
    $patient->birth_year = substr($dob,0,4);
    $patient->birth_month = substr($dob,5,2);
    $patient->birth_day = substr($dob,8,2);
    $patient->address = Input::get('address');
    $patient->address_2 = Input::get('address2');
    $patient->city_village = Input::get('city');
    $patient->state_province = Input::get('state');
    $patient->postal_code = Input::get('postal');
    $patient->country = Input::get('country');
    $patient->phone_number = Input::get('phone');
    $patient->save();

    // Get user to pass to master template in view
    $data['user'] = Auth::User();
    $data['patients'] = Patient::all();
    $data['num_patients'] = Patient::all()->count();
    $data['num_unapproved_users'] = User::where(['approved' => 0])->count();

    // Get patient from database to pass to view
    $data['patient'] = Patient::where('id', '=', $id)->first();
    $data['accounts'] = User::where('approved', '=', 1)->get();
    return Redirect::back()->with($data);
  }

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
    $data['num_unapproved_users'] = User::where(['approved' => 0])->count();

    return view('dashboard/patients')->with($data);
  }

  public function addPatient(){
    // Logic will need to be added to pass $data and authenticate user

    // Check if user is logged in, if not send back to home
    if(!Auth::check()){
      return Redirect::to('/');
    }

    $data['user'] = Auth::User();
    $data['patients'] = Patient::all();
    $data['num_patients'] = Patient::all()->count();
    $data['num_unapproved_users'] = User::where(['approved' => 0])->count();

    return view('dashboard/new_patient')->with($data);
  }

  public function insertPatient(){
    // Logic will need to be added to pass $data and authenticate user

    // Check if user is logged in, if not send back to home
    if(!Auth::check()){
      return Redirect::to('/');
    }

    // Collect variables from form
    $firstname = Input::get('firstname');
    $middlename = Input::get('middlename');
    $lastname= Input::get('lastname');
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
        // Create user
        $patient = Patient::create([
            'unidentified_patient' => 0,
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
