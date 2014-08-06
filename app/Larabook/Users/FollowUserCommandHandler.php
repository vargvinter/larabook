<?php namespace Larabook\Users;

use Laracasts\Commander\CommandHandler;
use Larabook\Users\UserRepository;

/**
* 
*/
class FollowUserCommandHandler implements CommandHandler {
	
	protected $userRepository;

	public function __construct(UserRepository $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	public function handle($command)
	{

		$user = $this->userRepository->findById($command->userId);
		$this->userRepository->follow($command->userIdToFollow, $user);

		return $user;
	}

}