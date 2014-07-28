<?php

Event::listen('Larabook.Registration.Events.UserRegistered', function($event) {
	//dd('sent email.');
});

Route::get('/', [
	'as' => 'home',
	'uses' => 'PagesController@home'
]);
Route::get('/register', [
	'as' => 'register_path',
	'uses' => 'RegistrationController@create'
]);
Route::post('/register', [
	'as' => 'register_path',
	'uses' => 'RegistrationController@store'
]);