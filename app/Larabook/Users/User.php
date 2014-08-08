<?php namespace Larabook\Users;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;
use Larabook\Registration\Events\UserRegistered;
use Larabook\Users\FollowableTrait;
use Eloquent, Hash;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, EventGenerator, PresentableTrait, FollowableTrait;

	protected $fillable = ['username', 'email', 'password'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	protected $presenter = 'Larabook\Users\UserPresenter';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function setPasswordAttribute($password)
	{
		$this->attributes['password'] = Hash::make($password);
	}

	public function statuses()
	{
		return $this->hasMany('Larabook\Statuses\Status');
	}

	public static function register($username, $email, $password) 
	{
		$user = new static(compact('username', 'email', 'password'));

		$user->raise(new UserRegistered($user));

		return $user;
	}

	public function is($user)
	{
		if(is_null($user)) return false;
		
		return $this->username == $user->username;
	}


}
