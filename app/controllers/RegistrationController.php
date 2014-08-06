<?php

use Larabook\Registration\RegisterUserCommand;
use Larabook\Forms\RegistrationForm;

class RegistrationController extends \BaseController {

	private $registrationForm;

	public function __construct(RegistrationForm $registrationForm)
	{
		$this->registrationForm = $registrationForm;
		$this->beforeFilter('guest');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /registration/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('registration.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /registration
	 *
	 * @return Response
	 */
	public function store()
	{
		$this->registrationForm->validate(Input::all());

		// extract(Input::only('username', 'email', 'password'));
		// $command = new RegisterUserCommand($username, $email, $password);
		// $user = $this->execute($command);

		$user = $this->execute(RegisterUserCommand::class);

		Auth::login($user);
		Flash::message('Glad to have you as a new Larabook member!');

		return Redirect::home();
	}



}