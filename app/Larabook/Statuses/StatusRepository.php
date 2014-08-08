<?php namespace Larabook\Statuses;

use Larabook\Statuses\Status;
use Larabook\Users\User;

/**
* 
*/
class StatusRepository {


	public function getAllForUser(User $user)
	{
		return $user->statuses()->with('user')->latest()->get();
	}

	public function getFeedForUser(User $user)
	{
		$userIds = $user->followedUsers()->lists('followed_id');
		$userIds[] = $user->id;

		return Status::whereIn('user_id', $userIds)->latest()->get();
	}

	public function save(Status $status, $userId)
	{
		return User::find($userId)->statuses()->save($status);
	}
}