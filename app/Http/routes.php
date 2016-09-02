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


Route::get('/login', function () {
    return view('pages_login');
});

Route::get('/register', function () {
    return view('pages_register');
});

Route::post('/register', array('uses' => 'RegistrationController@signUpUser'));


Route::get('/terms', function () {
    return view('terms');
});

// HomeController
Route::get('/', 'HomeController@viewLanding');
Route::get('/logout', 'HomeController@logout');

// Dashboard Home Routes
Route::get('/dashboard', 'Dashboard\HomeController@showHome');

// Login Routes
Route::post('/login', 'Auth\LoginController@login');
