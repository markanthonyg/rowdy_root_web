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
use App\Models\HealthHistory;

use Auth;

class HxController extends Controller
{
  public function updateHealthHistory() {
    if ($_POST['action'] = 'NewHx') {

      // this is the patient ID
      $hpid = Input::get('hpid');

      // this is present condition, currently we are not using this
      $pc = "N/A";


      // this is drug allergies
      $da = (Input::get('nkdaCheckboxModal')) ? "1" : "0";
      $da .= (Input::get('drug_allergyCheckboxModal')) ? "1" : "0";


      // this is past medical history
      $pmh = (Input::get('diabetesCheckboxModal')) ? "1" : "0";
      $pmh .= (Input::get('copdCheckboxModal')) ? "1" : "0";
      $pmh .= (Input::get('htnCheckboxModal')) ? "1" : "0";
      $pmh .= (Input::get('cadCheckboxModal')) ? "1" : "0";
      $pmh .= (Input::get('pvdCheckboxModal')) ? "1" : "0";
      $pmh .= (Input::get('chfCheckboxModal')) ? "1" : "0";
      $pmh .= Input::get('hypoCheckboxModal') ? "1" : "0";


      // this is bleeding tendencies
      $bt = Input::get('aspirinCheckboxModal') ? "1" : "0";
      $bt .= Input::get('plavixCheckboxModal') ? "1" : "0";
      $bt .= Input::get('bleedingCheckboxModal') ? "1" : "0";

      // this is past surgical history
      $psh = Input::get('pastSurgHistoryModal');

      // this is family history, currently not using
      $fh = "N/A";

      // this is the legal statement, currently not using
      $law = "N/A";

      // this is physical exam, currently not using
      $pe = "N/A";


      try {
          // Create and insert clinic
          HealthHistory::create([
              'pid' => $hpid,
              'pc' => $pc,
              'da' => $da,
              'bt' => $bt,
              'pmh' => $pmh,
              'psh' => $psh,
              'fh' => $fh,
              'law' => $law,
              'pe' => $pe
          ]);
      } catch (Exception $error_message) {
          // Error log
          Session::flash('error_message', 'Oops!, something went wrong!');
          return Response::json($error_message, 401);
      }
    }

    return Redirect::back();

  }

  public function editHx() {

    $vals = $_POST['values'];
    $array = explode(":", $vals);

    $pid = $array[0];
    $da = $array[1];
    $pmh = $array[2];
    $bt = $array[3];
    $psh = $array[4];

    $record = HealthHistory::where('pid', $pid);

    $record->da = $da;
    $record->pmh = $pmh;
    $record->bt = $bt;
    $record->psh = $psh;

    $record->save();

  }
}
