<?php namespace Larabook\Users;

use Laracasts\Commander\CommandHandler;
use Larabook\Users\UserRepository;

class UnfollowUserCommandHandler implements CommandHandler {

	protected $userRepository;

	public function __construct(UserRepository $userRepository)
	{
		$this->userRepository = $userRepository;
	}

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
    	$user = $this->userRepository->findById($command->userId);
    	$this->userRepository->unfollow($command->userIdToUnfollow, $user);
    }

}