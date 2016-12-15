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
  public function updateHealthHistory(Request $request) {
    if ($_POST['action'] = 'NewHx') {

      $hpid = Input::get('hpid');

      $pc = "Nothing";

      $nkda = $request->input('nkdaCheckbox', false);
      if ($nkda) {
        $da = "1";
      } else {
        $da = "0";
      }

      $drugallergy = $request->input('drug_allergyCheckbox', false);
      if ($drugallergy) {
        $da = $da . "1";
      } else {
        $da = $da . "0";
      }

      $diabetes = $request->input('diabetesCheckbox', false);
      if ($diabetes) {
        $pmh = "1";
      } else {
        $pmh = "0";
      }

      $copd = $request->input('copdCheckbox', false);
      if ($copd) {
        $pmh .= "1";
      } else {
        $pmh .= "0";
      }

      $htn = $request->input('htnCheckbox', false);
      if ($htn) {
        $pmh .= "1";
      } else {
        $pmh .= "0";
      }

      $cad = $request->input('cadCheckbox', false);
      if ($cad) {
        $pmh .= "1";
      } else {
        $pmh .= "0";
      }

      $pvd = $request->input('pvdCheckbox', false);
      if ($pvd) {
        $pmh .= "1";
      } else {
        $pmh .= "0";
      }

      $chf = $request->input('chfCheckbox', false);
      if ($chf) {
        $pmh .= "1";
      } else {
        $pmh .= "0";
      }

      $hypo = $request->input('hypoCheckbox', false);
      if ($hypo) {
        $pmh .= "1";
      } else {
        $pmh .= "0";
      }


      $aspirin = $request->input('aspirinCheckbox', false);
      $bt = ($aspirin ? "1" : "0");

      $plavix = $request->input('plavixCheckbox', false);
      $bt .= ($plavix ? "1" : "0
      ");
      $bleeding = $request->input('bleedingCheckbox', false);
      $bt .= ($bleeding ? "1" : "0");

      //$psh = Input::get('textArea3');
      $psh = "No past surgical history";

      $fh = "Nothing";

      $law = "Nothing";

      $pe = "Nothing";


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
}
