<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    // Show the dashboard Home
    public function showHome(){
      // Logic will need to be added to pass $data and authenticate user

      // For now, just returning the View
      return view('dashboard/home');
    }
}
