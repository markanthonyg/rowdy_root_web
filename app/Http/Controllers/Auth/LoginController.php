<?php

namespace App\Http\Controllers\Auth;

use Log;
use Auth;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    //  Login user
    public function login(){
      // Make sure crsf token is valid
      $this->middleware('crsf');

      // If remember me is selected or not
      if(Input::get('remember') == 'ON'){
        $remember = true;
      } else {
        $remember = false;
      }

      // Attempt to authenticate then redirect based on success
      if(Auth::attempt(['username' => Input::get('username'), 'password' => Input::get('password')], $remember)) {
        $data['user'] = Auth::User();

        return view('dashboard/home')->with($data);
      } else {
        Session::flash('login_error_message', 'Invalid credentials');

        return Redirect::back()->withInput(Input::all());
      }
    } // end of login function
}
