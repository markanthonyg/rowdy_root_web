<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Clinic;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    // Show register form
    public function showRegister() {
      // init variables
      $sql_clinics = array();
      $clinics = array();

      // Collect all clinics from the database for user to choose from
      $sql_clinics = Clinic::all();
      foreach ($sql_clinics as $clinic) {
        $clinics[$clinic['id']] = $clinic['Name'];
      }

      // dd($sql_clinics);

      // Setup data array to pass to view
      $data['array'] = array_add(['name' => 'Desk'], 'price', 100);
      $data['clinics'] = $clinics;
      $data['months'] = [
        '1' => 'Janruary',
        '2' => 'February',
        '3' => 'March',
        '4' => 'April',
        '5' => 'May',
        '6' => 'June',
        '7' => 'July',
        '8' => 'August',
        '9' => 'September',
        '10' => 'October',
        '11' => 'November',
        '12' => 'December'
      ];

      // Return view to display with data array
      return view('pages_register', $data);
    }

    // Register user into the database and return login page
    public function register() {
      // Define Validator
      // Validator takes all input and the array defines rules
      $validation = Validator::make(Input::all(), [
          'username' => 'required|unique:users,username',
          'password' => 'required|confirmed',
          'password_confirmation' => 'required',
          'email' => 'unique:users,email',
          'firstname' => 'required',
          'lastname' => 'required',
          'month_dob' => 'required',
          'day_dob' => 'required',
          'year_dob' => 'required',
          'gender' => 'required',
          'clinic' => 'required',
          'terms' => 'required'
      ]);

      // If validation fails
      if ($validation->fails()) {
          $messages = $validation->messages();
          Session::flash('register_validation_messages', $messages);

          return Redirect::to('/register')->withInput();
      }

      // Validation success

      // Collect variables from form
      $username = Input::get('username');
      $password = Input::get('password');
      $email = Input::get('email');
      $firstname = Input::get('firstname');
      $lastname = Input::get('lastname');
      $clinic = Input::get('clinic');
      $role = Input::get('role');

      try {
          // Create user
          User::create([
              'username' => $username,
              'password' => Hash::make($password),
              'email' => $email,
              'first_name' => $firstname,
              'last_name' => $lastname,
              'cid' => $clinic,
              'approved' => 0,
              'role' => 'emp'
          ]);
      } catch (Exception $error_message) {
          // Error log
          Session::flash('error_message', 'Oops!, something went wrong!');

          return Response::json($error_message, 401);
      }

      // Registration successful
      Session::flash('registration_success', 'Account has been submitted for approval');

      return Redirect::to('/login');
    }
}
