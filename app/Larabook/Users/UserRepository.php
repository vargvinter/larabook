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

	public function getPaginated($howMany = 25)
	{
		return User::simplePaginate($howMany);
	}
}