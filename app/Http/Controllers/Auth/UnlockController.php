<?php

namespace App\Http\Controllers\Auth;

use Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UnlockController extends Controller
{
    // Unlock from screenlock
    public function unlockScreen(){
      // Attempt to authenticate then redirect based on success
      if(Auth::attempt(['username' => Input::get('username'), 'password' => Input::get('password')], false)) {
        return Redirect::to('/dashboard');
      } else {
        Session::flash('login_error_message', 'Invalid password');

        // Gather data to pass back to view
        $data['username'] = Input::get('username');
        $data['first_name'] = Input::get('first_name');
        $data['last_name'] = Input::get('last_name');

        // Dont user redirect so we can pass data back
        return view('pages_screenlock', $data);
      }
    }
}
