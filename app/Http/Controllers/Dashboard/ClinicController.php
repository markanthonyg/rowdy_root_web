<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\Clinic;
use Auth;

class ClinicController extends Controller
{

  public function updateClinic() {
    if ($_POST['action'] == 'Update') {
      $id = Input::get('id');
  		$clinic = Clinic::find($id);
      $clinic->Name = Input::get('clinicName');
      $clinic->save();
    } else if ($_POST['action'] == 'Delete') {
      $id = Input::get('id');
  		$clinic = Clinic::find($id);
      $clinic->delete();
    } else if ($_POST['action'] == 'Add') {
      // check if user is logged in, if not send back to Home
      if (!Auth::check()) {
        return Redirect::to('/');
      }

      $validation = Validator::make(Input::all(), [
          'clinicName' => 'required|unique:clinics,Name'
      ]);

      // If validation fails
      if ($validation->fails()) {
          $messages = "Clinic name already taken";
          //$messages = $validation->messages();
          Session::flash('clinic_validation_messages', $messages);

          return Redirect::to('/new_clinic')->withInput();
      }

      $clinicName = Input::get('clinicName');

      try {
          // Create and insert clinic
          Clinic::create([
              'Name' => $clinicName
          ]);
      } catch (Exception $error_message) {
          // Error log
          Session::flash('error_message', 'Oops!, something went wrong!');

          return Response::json($error_message, 401);
      }
    }
    return Redirect::back();
  }

  public function newClinic() {
    // check if user is logged in, if not send back to Home
    if (!Auth::check()) {
      return Redirect::to('/');
    }

    $data['user'] = Auth::User();
    $data['num_unapproved_users'] = User::where(['approved' => 0])->count();
    return view('dashboard/new_clinic')->with($data);
    // ...
  }



  public function showClinics() {
    // check if user is logged in, if not send back to Home
    if (!Auth::check()) {
      return Redirect::to('/');
    }
    // ...

    $data['user'] = Auth::User();
    $data['clinics'] = Clinic::all();
    $data['num_clinics'] = Clinic::all()->count();
    $data['num_unapproved_users'] = User::where(['approved' => 0])->count();
    return view('dashboard/clinics')->with($data);

  }

}
