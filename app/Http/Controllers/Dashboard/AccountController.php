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
class AccountController extends Controller {

	public function updateAccount() {
		$id = Input::get('id');
		$account = User::find($id);
		$account->first_name = Input::get('firstname');
		$account->middle_name = Input::get('middlename');
		$account->last_name = Input::get('lastname');
		$account->gender = Input::get('gender');
		$account->dob = Input::get('dob');
		$account->role = Input::get('role');
		$account->email = Input::get('email');
		$account->save();

		$data['user'] = Auth::User();
		$data['num_unapproved_users'] = User::where(['approved' => 0])->count();
		$data['accounts'] = User::where('approved', '=', 1)->get();
		return view('dashboard/accountList')->with($data);
	}

	public function deleteAccount($id) {
		$id = Input::get('id');
		$this->deleteAccount($id);
	}

	public function showAllAccounts(){
		$data['user'] = Auth::User();
		$data['num_unapproved_users'] = User::where(['approved' => 0])->count();
		$data['accounts'] = User::where('approved', '=', 1)->get();
		return view('dashboard/accountList')->with($data);
	}

}
