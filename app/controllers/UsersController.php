<?php

use Larabook\Users\UserRepository;

class UsersController extends \BaseController {

	protected $userRepository;

	public function __construct(UserRepository $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = $this->userRepository->getPaginated();

		return View::make('users.index', compact('users'));
	}

	public function show($username)
	{
		$user = $this->userRepository->findByUsername($username);

		return View::make('users.show', compact('user'));
	}

}
