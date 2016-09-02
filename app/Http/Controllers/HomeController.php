<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    // viewLanding
    public function viewLanding(){
      if(Auth::check()){
        return Redirect::to('/dashboard');
      }

      return view ('landing');
    }

    // Logout the current user
    public function logout(){
      Auth::logout();
      Session::flush();
      return Redirect::to('/');
    }
}
