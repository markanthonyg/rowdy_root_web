<?php  

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\Patient;
use Auth;

class UploadController extends Controller
{

  public function uploadFile() {
      $FILES = Input::file('file');
      print $FILES;
      print "here";
      $id = Input::get('id');
		  $patient = Patient::find($id);

      $targetDir = "uploads/";
      $fileName = $FILES['file']['name'];
      $targetFile = $targetDir.$fileName;
      
      if(move_uploaded_file($FILES['file']['tmp_name'],$targetFile)){
          //insert file information into db table
          $file = Files::create([
            'pid' => $patient->id,
            'file_name' => $fileName,
        ]);
      }
      //return Redirect::back();
    }
  
}