<?php namespace Larabook\Users;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;
use Larabook\Registration\Events\UserRegistered;
use Eloquent, Hash;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, EventGenerator, PresentableTrait;

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

	public function follows()
	{
		// return $this->belongsToMany(self::class, 'follows', 'follower_id', 'followed_id')->withTimestamps();

		/** LUB */

		return $this->belongsToMany('Larabook\Users\User', 'follows', 'follower_id', 'followed_id')->withTimestamps();
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

	public function isFollowedBy(User $otherUser)
	{
		$idsWhoOtherUserFollows = $otherUser->follows()->lists('followed_id');
		return in_array($this->id, $idsWhoOtherUserFollows);
	}

}
