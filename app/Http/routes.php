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
Route::get('/visits', 'Dashboard\VisitsController@showVisits');
Route::get('/new_patient', 'Dashboard\PatientsController@addPatient');
Route::post('/new_patient', 'Dashboard\PatientsController@insertPatient');
Route::get('/clinics', 'Dashboard\ClinicController@showClinics');
Route::get('/new_clinic', 'Dashboard\ClinicController@newClinic');
Route::post('/new_clinic', 'Dashboard\ClinicController@insertClinic');
Route::post('/clinic', 'Dashboard\ClinicController@updateClinic');

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
Route::post('/livesearchMeds', 'MiscController@livesearchMeds');

// Profile Routes
Route::get('/patient/{id}', 'Dashboard\ProfileController@showPatientProfile');
Route::post('/patient', 'Dashboard\PatientsController@updatePatient');

// Vital Routes
Route::post('/patient_profile/updateVital', 'Dashboard\VitalsController@updateVital');

// Health History Routes
Route::post('/patient_profile/updateHistory', 'Dashboard\HxController@updateHealthHistory');

// Account Request Routes
Route::get('/accountRequestList', 'Dashboard\AccountRequestController@showAllAccountRequest');
Route::post('/accountRequestList', 'Dashboard\AccountRequestController@updateAccount');

// Account Routes
Route::get('/accountList', 'Dashboard\AccountController@showAllAccounts');
Route::post('/accountList', 'Dashboard\AccountController@deleteAccount');
Route::post('/accountList', 'Dashboard\AccountController@updateAccount');

// Visit Routes
Route::get('/new_visit', 'Dashboard\VisitsController@addVisit');
Route::post('/new_visit/newvisit', 'Dashboard\VisitsController@insertVisit');
Route::get('/new_patient_visit/{pid}', 'Dashboard\VisitsController@addPatientVisit');
Route::post('/new_patient_visit', 'Dashboard\VisitsController@insertPatientVisit');
Route::get('/visit/{vid}', 'Dashboard\VisitsController@visitDetailView');
Route::post('/visit', 'Dashboard\VisitsController@goBack');

// EMAIL (SEND)
Route::post('/', 'EMailController@send');

// api
Route::get('patientsapi', 'API\APIController@allPatients');
Route::get('usersapi', 'API\APIController@allUsers');

Route::get('/patient_profile/upload', function() {
  return View::make('pages.upload');
});
Route::post('/patient_profile/upload', 'Dashboard\UploadController@upload');

// Surgical Procedure routes
Route::post('/patient_profile/addPro', 'Dashboard\SurgicalProceduresController@addProcedure');
