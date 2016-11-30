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
// use App\Models\Patient;
use App\Models\Vital;

use Auth;


class VitalsController extends Controller
{

  public function updateVital() {

    if ($_POST['action'] == 'UpdateVital') {

      $vid = Input::get('vid');
  		$vital = Vital::find($vid);

      // $vital->id = Input::get('vid');
      $vital->pid = Input::get('vpid');
      $vital->bps = Input::get('bps');
      $vital->bpd = Input::get('bpd');
      $vital->bpunit = Input::get('bpunit');
      $vital->fasting = Input::get('fasting');
      $vital->bg = Input::get('bg');
      $vital->bgUnit = Input::get('bgUnit');
      $vital->o2sat = Input::get('o2sat');
      $vital->hb = Input::get('hb');
      $vital->hfeet = Input::get('hfeet');
      $vital->hinches = Input::get('hinches');
      $vital->hcm = Input::get('hcm');
      $vital->hunit = Input::get('hunit');
      $vital->weight = Input::get('weight');
      $vital->wunit = Input::get('wunit');
      $vital->notes = Input::get('notes');

      $vital->save();

    } else if ($_POST['action'] == 'DeleteVital') {

      $id = Input::get('vid');
      $vital = Vital::find($id);
      $vital->delete();

    } else if ($_POST['action'] == 'AddVital') {
      // check if user is logged in, if not send back to Home
      if (!Auth::check()) {
        return Redirect::to('/');
      }

      // $validation = Validator::make(Input::all(), [
      //     'clinicName' => 'required|unique:clinics,Name'
      // ]);
      //
      // // If validation fails
      // if ($validation->fails()) {
      //     $messages = "Clinic name already taken";
      //     //$messages = $validation->messages();
      //     Session::flash('clinic_validation_messages', $messages);
      //
      //     return Redirect::to('/new_clinic')->withInput();
      // }

      $pid = Input::get('vpid');
      $bps = Input::get('bps');
      $bpd = Input::get('bpd');
      $bpunit = Input::get('bpunit');
      $fasting = Input::get('fasting');
      $bg = Input::get('bg');
      $bgUnit = Input::get('bgUnit');
      $o2sat = Input::get('o2sat');
      $hb = Input::get('hb');
      $hfeet = Input::get('hfeet');
      $hinches = Input::get('hinches');
      $hcm = Input::get('hcm');
      $hunit = Input::get('hunit');
      $weight = Input::get('weight');
      $wunit = Input::get('wunit');
      $notes = Input::get('notes');

      try {
          // Create and insert clinic
          Vital::create([
              'pid' => $pid,
              'bps' => $bps,
              'bpd' => $bpd,
              'bpunit' => $bpunit,
              'fasting' => $fasting,
              'bg' => $bg,
              'bgUnit' => $bgUnit,
              'o2sat' => $o2sat,
              'hb' => $hb,
              'hfeet' => $hfeet,
              'hinches' => $hinches,
              'hcm' => $hcm,
              'hunit' => $hunit,
              'weight' => $weight,
              'wunit' => $wunit,
              'notes' => $notes
          ]);
      } catch (Exception $error_message) {
          // Error log
          Session::flash('error_message', 'Oops!, something went wrong!');
          return Response::json($error_message, 401);
      }
    } //end switch

    // return response()->json(['test' => Vital::find(Input::get('vid'))]);

    return Redirect::back();

    // Get user to pass to master template in view

    // // Probably not need
    // $data['user'] = Auth::User();
    // $data['patients'] = Patient::all();
    // $data['num_patients'] = Patient::all()->count();
    // $data['num_unapproved_users'] = User::where(['approved' => 0])->count();
    //
    // // Get patient from database to pass to view
    // $data['patient'] = Patient::where('id', '=', $id)->first();
    // $data['accounts'] = User::where('approved', '=', 1)->get();
    // // return Redirect::back();//->with($data);
    //
    // $data['patient'] = Patient::where('id', '=', $id)->first();
    //
    // return view('Dashboard/patient_profile')->with($data);
  }
}
