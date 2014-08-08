<?php namespace Larabook\Users;

trait FollowableTrait {

	public function followedUsers()
	{
		// return $this->belongsToMany(static::class, 'follows', 'follower_id', 'followed_id')->withTimestamps();

		/** LUB */

		return $this->belongsToMany('Larabook\Users\User', 'follows', 'follower_id', 'followed_id')->withTimestamps();
	}

	public function followers()
	{
		return $this->belongsToMany('Larabook\Users\User', 'follows', 'followed_id', 'follower_id')->withTimestamps();
	}		

	public function isFollowedBy(User $otherUser)
	{
		$idsWhoOtherUserFollows = $otherUser->followedUsers()->lists('followed_id');
		return in_array($this->id, $idsWhoOtherUserFollows);
	}	

}