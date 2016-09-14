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


Route::get('/register', function () {
    return view('pages_register');
});

Route::get('/terms', function () {
    return view('terms');
});

// HomeController
Route::get('/', 'HomeController@viewLanding');
Route::get('/logout', 'HomeController@logout');

// Dashboard Routes
Route::get('/dashboard', 'Dashboard\HomeController@showHome');
Route::get('/patients', 'Dashboard\PatientsController@showPatients');

// Login Routes
Route::get('/login', 'Auth\LoginController@showLogin');
Route::post('/login', 'Auth\LoginController@login');

// Screenlock Routes
Route::get('/screenlock', 'MiscController@lockScreen');
Route::post('/screenlock', 'Auth\UnlockController@unlockScreen');
