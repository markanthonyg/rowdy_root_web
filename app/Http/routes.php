<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/terms', function () {
    return view('terms');
});

// HomeController
Route::get('/', 'HomeController@viewLanding');
Route::get('/logout', 'HomeController@logout');

// Dashboard Routes
Route::get('/dashboard', 'Dashboard\HomeController@showHome');
Route::get('/patients', 'Dashboard\PatientsController@showPatients');
Route::get('/new_patient', 'Dashboard\PatientsController@addPatient');
Route::post('/new_patient', 'Dashboard\PatientsController@insertPatient');

// Login Routes
Route::get('/login', 'Auth\LoginController@showLogin');
Route::post('/login', 'Auth\LoginController@login');

// Registration Routes
Route::get('/register', 'Auth\RegistrationController@showRegister');
Route::post('/register', 'Auth\RegistrationController@register');

// Screenlock Routes
Route::get('/screenlock', 'MiscController@lockScreen');
Route::post('/screenlock', 'Auth\UnlockController@unlockScreen');

// Live Search Routes
Route::post('/livesearch', 'MiscController@livesearch');

// Profile Routes
Route::get('/patient/{id}', 'Dashboard\ProfileController@showPatientProfile');

// Account Request Routes
Route::get('/accountRequestList', 'Dashboard\AccountRequestController@showAllAccountRequest');
Route::post('/accountRequestList', 'Dashboard\AccountRequestController@updateAccount');

// Account Routes
Route::get('/accountList', 'Dashboard\AccountController@showAllAccounts');
Route::post('/accountList', 'Dashboard\AccountController@updateAccount');
