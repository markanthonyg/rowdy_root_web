<?php

namespace App\Http\Controllers;

use Mail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;

class EMailController extends Controller
{
    // Send email to jacobdaily737@gmail.com to notify of question or concern
    public function send(){
      $name = Input::get('name');
      $email = Input::get('email');

      Mail::send('emails.send', ['name' => $name, 'email' => $email], function ($message) {
          $message->from(Input::get('email'));
          $message->to('jacobdaily737@gmail.com', 'RRW')->subject('Question or concern from RRW');
      });

      return Redirect::to('/');
    }
}
