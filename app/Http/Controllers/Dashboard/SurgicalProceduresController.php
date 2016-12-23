<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\Surgery;
use App\Models\Patient;
use Auth;

class SurgicalProceduresController extends Controller
{

  public function addProcedure(){



   // Check if user is logged in, if not send back to home
    if(!Auth::check()){
      return Redirect::to('/');
    }

    // Collect variables from form
    $pid = Input::get('pid');
    $title = Input::get('templateSelect');
    $body = Input::get('surgicalTemplate');

    try {
        $surgery = Surgery::create([
            'pid' => $pid,
            'title' => $title,
            'body' => $body,
        ]);
    } catch (Exception $error_message) {
        // Error log
        Session::flash('error_message', 'Oops!, something went wrong!');

        return Response::json($error_message, 401);
    }

    $data['user'] = Auth::User();
    $data['patients'] = Patient::all();
    $data['num_patients'] = Patient::all()->count();
    $data['num_unapproved_users'] = User::where(['approved' => 0])->count();
    $data['surgeries'] = Surgery::where(['pid' => $pid])->get();
    return Redirect::back()->with($data);
  }
}
