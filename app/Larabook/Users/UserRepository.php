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
		return User::orderBy('username')->simplePaginate($howMany);
	}


    public function findByUsername($username)
    {
        return User::with(['statuses' => function($query) {
        	$query->latest();
        }])->whereUsername($username)->first();
    }

    public function findById($id)
    {
    	return User::findOrFail($id);
    }

    public function follow($userIdToFollow, User $user)
    {
    	return $user->follows()->attach($userIdToFollow);
    }

}