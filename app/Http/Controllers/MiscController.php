<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use App\Models\User;
use App\Models\Patient;

use App\Http\Requests;

class MiscController extends Controller
{
    /*
    ** Lock screen
    */
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

    /*
    ** Handle Live Search
    */
    public function livesearch() {
      // Search Users table for all users matching the query
      $users = Patient::where('first_name', 'like', $_POST['search'].'%')->orwhere('last_name', 'like', $_POST['search'].'%')->orwhere('id', 'like', $_POST['search'])->get();

      if($users->count() == 0){
        echo '<div class="name">
                No results found.
              </div>';
      }

      // For each user found in the query, list them under the live search bar
      foreach($users as $user){
        // Echo out the div block to be added to result
        // If patient is not an unidentified patient, list ID, FirstName, LastName
        if($user->unidentified_patient == 0){
          $bolded = '<strong>'.$_POST['search'].'</strong>';
          $final_first_name = str_ireplace($_POST['search'], $bolded, $user->first_name);
          $final_last_name = str_ireplace($_POST['search'], $bolded, $user->last_name);
          $final_id = str_ireplace($_POST['search'], $bolded, $user->id);

          //  HTML block to be added to result element
          echo '<div class="show" align="left">
                  <span class="id">'.$final_id.' | </span>
                  <span  class="name">'.$final_last_name.', '.$final_first_name.'</span>
                </div>';
        } else { // If patient is unidentified, list ID and 'Unidentified Patient'
          $bolded = '<strong>'.$_POST['search'].'</strong>';
          $final_id = str_ireplace($_POST['search'], $bolded, $user->id);

          //  HTML block to be added to result element
          echo '<div class="show" align="left">
                  <span class="id">'.$final_id.' | </span>
                  <span  class="name">Unidentified Patient</span>
                </div>';
        }
      }
    }
}
