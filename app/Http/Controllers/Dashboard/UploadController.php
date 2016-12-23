<?php
namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\Surgery;
use App\Models\File;
use App\Models\Patient;
use Auth;

class UploadController extends Controller {
public function upload() {
  // getting all of the post data
  $file = array('image' => Input::file('image'));
  $pid = Input::get('fpid');
  print $pid;
  // setting up rules
  $rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000

    // checking file is valid.
    if (Input::file('image')->isValid()) {
      $destinationPath = 'uploads'; // upload path
      $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
      $fileName = rand(11111,99999).'.'.$extension; // renameing image
      Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
      // sending back with message

      try {
          $file = File::create([
              'pid' => $pid,
              'file_name' => $fileName
          ]);
      } catch (Exception $error_message) {
          // Error log
          Session::flash('error_message', 'Oops!, something went wrong!');

          return Response::json($error_message, 401);
      }


    }
      // sending back with error message.

      $data['files'] = File::where(['pid' => $pid])->get();
      $data['user'] = Auth::User();
      $data['patients'] = Patient::all();
      $data['num_patients'] = Patient::all()->count();
      $data['num_unapproved_users'] = User::where(['approved' => 0])->count();
      $data['surgeries'] = Surgery::where(['pid' => $pid])->get();
      return Redirect::back()->with($data);


}
}
