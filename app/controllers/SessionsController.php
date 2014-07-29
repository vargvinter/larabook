<?php

use Larabook\Forms\SignInForm;

class SessionsController extends \BaseController {

	protected $signInForm;

	public function __construct(SignInForm $signInForm)
	{
		$this->signInForm = $signInForm;
		$this->beforeFilter('guest', ['except' => 'destroy']);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('email', 'password');
		$this->signInForm->validate($input);

		if (Auth::attempt($input)) {
			Flash::message('Welcome back!');
			return Redirect::intended('/statuses');
		}

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();
		Flash::message('You have now been logged out.');
		return Redirect::home();
	}


}
