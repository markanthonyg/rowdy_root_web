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

  public function showAllAccountRequest(){
    $data['user'] = Auth::User();
    $data['num_unapproved_users'] = User::where(['approved' => 0])->count();
		$data['accounts'] = User::where('approved', '=', 0)->get();
    return view('dashboard/accountList')->with($data);
	}

	/**
	*  Get all patients in the database
	*
	*  @return Json encoded array of all patient records
	*/
	public function getAllAccountRequest(){
		$accounts = User::where('approved', '=', 0)->get();
		return $accounts->toJson();
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// Update the approval on the account
		$user = User::where('id', '=', $id);

		if(!$user){
			Session::flash('error_message', 'User Not Found');
			return;
		}

		$user->update([
			'id' => $id,
			'approved' => Input::get('approved')
		]);

		// if(!$user->update()){
		// 	Session::flash('error_message', 'User Could Not Be Updated');
		// 	return;
		// }
	}

}
