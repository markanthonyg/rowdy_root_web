<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;

class EMailController extends Controller
{
    // Send email to jacobdaily737@gmail.com to notify of question or concern
    public function send(){
      $title = Input::get('name');
      $content = Input::get('email');

      Mail::send('emails.send', ['title' => $title, 'content' => $content], function ($message)
      {
          $message->from('RRW_Webpage@qoc.com', 'RowdyRootWeb');

          $message->to('jacobdaily737@gmail.com');
      });

      dd('got here');

      return Redirect::to('/');
    }
}
