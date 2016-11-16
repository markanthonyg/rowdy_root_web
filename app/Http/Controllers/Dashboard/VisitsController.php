<?php

namespace App\Http\Controllers\Dashboard;

use Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\User;

class VisitsController extends Controller
{
    // Show form to add a new visit
    public function addVisit() {
      // Get user to pass to master template in view
      $data['user'] = Auth::User();
      $data['num_unapproved_users'] = User::where(['approved' => 0])->count();

      return view('dashboard/new_visit', $data);
    }

    // Insert visit into DB
    public function insertVisit() {

    }
}
