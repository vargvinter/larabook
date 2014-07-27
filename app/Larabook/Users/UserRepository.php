<?php namespace Larabook\Users;


use Larabook\Users\User;

/**
* 
*/
class UserRepository {


	public function save(User $user)
	{
		return $user->save();
	}
}