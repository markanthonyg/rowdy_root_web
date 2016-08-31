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

Route::get('/', function () {
    return view('landing');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/login', function () {
    return view('pages_login');
});

Route::get('/register', function () {
    return view('pages_register');
});

// RegistrationController
//Route::post('/register', 'RegistrationController@signUpUser');

Route::post('/register', function () {
    return view('landing');
});

Route::get('/terms', function () {
    return view('terms');
});
