<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use App\Http\Requests;

class MiscController extends Controller
{
    // Lock screen
    public function lockScreen(){
      // Get User model to pass to screenlock
      $user = Auth::User();
      
      $data['username'] = $user->username;
      $data['first_name'] = $user->first_name;
      $data['last_name'] = $user->last_name;

      // Log user out so back button cannot be used to regain access
      Auth::logout();

      // Retrun screenlock view
      return view('pages_screenlock', $data);
    }
}
