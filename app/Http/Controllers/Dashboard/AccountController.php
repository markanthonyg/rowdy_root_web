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
				if(Input::get('name') == "delete") {
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

	public function showAllAccounts(){
		$data['user'] = Auth::User();
		$data['num_unapproved_users'] = User::where(['approved' => 0])->count();
		$data['accounts'] = User::where('approved', '=', 1)->get();
		return view('dashboard/accountList')->with($data);
	}

}
