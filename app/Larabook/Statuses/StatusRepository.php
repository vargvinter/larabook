<?php namespace Larabook\Statuses;

use Larabook\Statuses\Status;
use Larabook\Users\User;

/**
* 
*/
class StatusRepository {


	public function getAllForUser(User $user)
	{
		return $user->statuses()->get();
	}

	public function save(Status $status, $userId)
	{
		return User::find($userId)->statuses()->save($status);
	}
}