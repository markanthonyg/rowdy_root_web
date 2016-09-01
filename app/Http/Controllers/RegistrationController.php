<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class RegistrationController extends Controller
{
  public function signUpUser() {
    $fieldsValidation = Validator::make(Input::all(), [
        'username' => 'required',
        'password' => 'required',
        'email' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
    ]);

    // If validation fails
    if ($fieldsValidation->fails()) {
        $messages = $fieldsValidation->messages();
        Session::flash('signup_missing_fields', $messages);

        return View::make('pages_register');
    }
  }
}
