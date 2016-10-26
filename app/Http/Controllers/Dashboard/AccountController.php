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

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// Updates the patient with id $id from the database
		$user = User::find($id);

		if(!$user){
			Session::flash('error_message', 'User Not Found');
			return;
		}

		$user->update([
			'id' => $id,
			'first_name' => Input::get('first_name'),
			'middle_name' => Input::get('middle_name'),
			'last_name' => Input::get('last_name'),
			'dob' => Input::get('dob'),
			'gender' => Input::get('gender'),
			'role' => Input::get('role')
		]);

		if(!$user->update()){
			Session::flash('error_message', 'User Could Not Be Updated');
			return;
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// Destroys the account with id $id from the database
		User::destroy($id);
	}

	public function listAccounts(){
		$accounts = User::where('approved', '=', 1)->get();
		$data['accounts'] = $accounts;

		return View::make('accountList', $data);
	}


}
