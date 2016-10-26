<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\Patient;
use Illuminate\Support\Facades\View;
use Auth;

class AccountRequestController extends Controller
{

  public function updateAccount() {
        $id = Input::get('id');
        if(Input::get('name') == "approve") {
            $this->approveAccount($id);
        } else if(Input::get('name') == "deny") {
            $this->deleteAccount($id);
        }
    }

  public function deleteAccount($id) {
    $account = User::find($id);

    if(!$account){
			Session::flash('error_message', 'User Not Found');
			return;
		}

    $account->delete();
    return Response::json(array('success' => true));
  }

  public function approveAccount($id) {
    $account = User::find($id);

		if(!$account){
			Session::flash('error_message', 'User Not Found');
			return;
		}

    $account->approved = 1;
    $account->save();
    return Response::json(array('success' => true));
	}

  public function showAllAccountRequest(){
    $data['user'] = Auth::User();
    $data['num_unapproved_users'] = User::where(['approved' => 0])->count();
		$data['accounts'] = User::where('approved', '=', 0)->get();
    return view('dashboard/accountRequestList')->with($data);
	}

	public function getAllAccountRequest(){
		$accounts = User::where('approved', '=', 0)->get();
		return $accounts->toJson();
	}
}
