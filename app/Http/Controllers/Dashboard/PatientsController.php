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
    $birthday = Input::get('birthday');
    $birthmonth = Input::get('birthmonth');
    $birthyear = Input::get('birthyear');
    $address = Input::get('address');
    $address2 = Input::get('address2');
    $city = Input::get('city');
    $state = Input::get('state');
    $country = Input::get('country');
    $zip = Input::get('zip');
    $phone = Input::get('phone');

    try {
        // Create user
        Patient::create([
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

    return Redirect::to('/dashboard');
  }
}
